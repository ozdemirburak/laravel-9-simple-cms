<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use Analytics;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Spatie\Analytics\Period;

class DashboardController extends AdminController
{
    /**
     * Total day scope for statistics
     *
     * @var int
     */
    protected $period;

    /**
     * Total results
     *
     * @var int
     */
    protected $limit;

    /**
     * Country variable for the regions distribution
     *
     * @var mixed
     */
    protected $country;

    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $end = Carbon::now()->minute(0);
        $this->limit = 16;
        $this->period = Period::create($end->copy()->subDays(30), $end);
        $this->country = env('ANALYTICS_COUNTRY');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        if (env('ANALYTICS_CONFIGURED') === false) {
            $this->model = 'User';
            return $this->redirectRoutePath('index', 'admin.fields.dashboard.invalid_setup');
        } else {
            $statistics = [
                'referrers' => Analytics::fetchTopReferrers($this->period, $this->limit),
                'browsers' => Analytics::fetchTopBrowsers($this->period, $this->limit),
                'pages' => Analytics::fetchMostVisitedPages($this->period, $this->limit),
                'total_visits' => $this->getTotalVisits(),
                'landings' => $this->getLandings(),
                'exits' => $this->getExits(),
                'times' => $this->getTimeOnPages(),
                'sources' => $this->getSources(),
                'ops' => $this->getOperatingSystems(),
                'browsers' => $this->getBrowsers(),
                'countries' => $this->getCountries(),
                'visits' => $this->getDailyVisits(),
                'regions' => $this->getRegions(),
                'keywords' => $this->getTopKeywords(),
                'averages' => $this->getAverages()
            ];
            return view('admin.dashboard.index', compact('statistics'));
        }
    }

    /**
     * Simplify the query
     *
     * @param array $options
     * @param string $metrics
     * @return mixed
     */
    protected function query($options = [], $metrics = 'ga:visits')
    {
        return Analytics::performQuery($this->period, $metrics, $options)->rows;
    }

    /**
     * Transform analytics array into a collection
     *
     * @param $data
     * @param $fields
     * @param int $offset
     * @return Collection
     */
    protected function makeCollection($data, $fields, $offset = 1)
    {
        if (is_null($data)) {
            return new Collection([]);
        } else {
            foreach ($data as $pageRow) {
                $keywordData[] = [$fields[0] => $pageRow[0], $fields[1] => $pageRow[$offset]];
            }
            return new Collection($keywordData);
        }
    }

    /**
     * Total visits
     *
     * @return mixed
     */
    private function getTotalVisits()
    {
        $options = ['dimensions' => 'ga:year'];
        return $this->query($options)[0][1];
    }

    /**
     * Total visits
     *
     * @return mixed
     */
    private function getTopKeywords()
    {
        $options = ['dimensions' => 'ga:keyword', 'sort' => '-ga:sessions', 'max-results' => $this->limit];
        return $this->makeCollection($this->query($options, 'ga:sessions'), ['0' => 'keyword', '1' => 'sessions']);
    }

    /**
     * Landing pages
     *
     * @return mixed
     */
    private function getLandings()
    {
        $options = ['dimensions' => 'ga:landingPagePath', 'sort' => '-ga:entrances', 'max-results' => $this->limit];
        return $this->makeCollection($this->query($options, 'ga:entrances'), ['0' => 'path', '1' => 'visits']);
    }

    /**
     * Exit pages
     *
     * @return mixed
     */
    private function getExits()
    {
        $options = ['dimensions' => 'ga:exitPagePath', 'sort' => '-ga:exits', 'max-results' => $this->limit];
        return $this->makeCollection($this->query($options, 'ga:exits'), ['0' => 'path', '1' => 'visits']);
    }

    /**
     * Time spent on pages
     *
     * @return Collection
     */
    private function getTimeOnPages()
    {
        $options = ['dimensions' => 'ga:pagePath', 'sort' => '-ga:timeOnPage', 'max-results' => $this->limit];
        return $this->makeCollection($this->query($options, 'ga:timeOnPage'), ['0' => 'path', '1' => 'time']);
    }

    /**
     * Traffic sources
     *
     * @return mixed
     */
    private function getSources()
    {
        $options = ['dimensions' => 'ga:source, ga:medium', 'sort' => '-ga:visits', 'max-results' => $this->limit];
        return $this->makeCollection($this->query($options), ['0' => 'path', '1' => 'visits'], 2);
    }

    /**
     * Operating systems
     *
     * @return mixed
     */
    private function getOperatingSystems()
    {
        $options = ['dimensions' => 'ga:operatingSystem', 'sort' => '-ga:visits', 'max-results' => $this->limit];
        return $this->makeCollection($this->query($options), ['0' => 'os', '1' => 'visits']);
    }

    /**
     * Browsers
     *
     * @return mixed
     */
    private function getBrowsers()
    {
        $options = ['dimensions' => 'ga:browser', 'sort' => '-ga:visits', 'max-results' => $this->limit];
        return $this->makeCollection($this->query($options), ['0' => 'browser', '1' => 'visits']);
    }

    /**
     * Country distribution
     *
     * @param array $visits
     *
     * @return string
     */
    private function getCountries($visits = [])
    {
        $options = ['dimensions' => 'ga:country', 'sort' => '-ga:visits'];
        $array = $this->query($options);
        if (count($array)) {
            foreach ($array as $k => $v) {
                $visits[$k] = [$v[0], (int) $v[1]];
            }
        }
        return json_encode($visits);
    }

    /**
     * Daily visits
     *
     * @param array $visits
     *
     * @return string
     */
    private function getDailyVisits($visits = [])
    {
        $options = ['dimensions' => 'ga:date'];
        $array = $this->query($options);
        foreach ($array as $k => $v) {
            $visits[$k]['date']   = Carbon::parse($v['0'])->format('Y-m-d');
            $visits[$k]['visits'] = $v['1'];
        }
        return json_encode($visits);
    }

    /**
     * Region distribution for a specific country
     *
     * @param array $visits
     *
     * @return string
     */
    private function getRegions($visits = [])
    {
        $options = [
            'dimensions' => 'ga:country, ga:region',
            'sort' => '-ga:visits',
            'filters' => 'ga:country==' . $this->country . ''
        ];
        $array = $this->query($options);
        if (count($array)) {
            foreach ($array as $k => $v) {
                $visits[$k] = [str_replace(" Province", "", $v[1]), (int) $v[2]];
            }
        }
        return json_encode($visits);
    }

    /**
     * Average time on pages, bounce rate and page views per visits
     *
     * @return array
     */
    private function getAverages()
    {
        $options = ['dimensions' => 'ga:pagePath'];
        $array = $this->query($options, 'ga:avgTimeOnPage, ga:entranceBounceRate, ga:pageviewsPerVisit');
        $count = count($array);
        $average = ['time' => 0, 'bounce' => 0, 'visit' => 0];
        if ($count) {
            foreach ($array as $v) {
                $average['time']   += $v['1'];
                $average['bounce'] += $v['2'];
                $average['visit']  += $v['3'];
            }
            $average['time']   = ($average['time'] ? floor($average['time'] / $count) : 0);
            $average['bounce'] = ($average['bounce'] ? round($average['bounce'] / $count, 2) : 0);
            $average['visit']  = ($average['visit'] ? round($average['visit'] / $count, 2) : 0);
        }
        return $average;
    }
}
