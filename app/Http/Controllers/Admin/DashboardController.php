<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use LaravelAnalytics;

class DashboardController extends Controller
{
    /**
     * Total day scope for statistics
     *
     * @var int
     */
    private $period;

    /**
     * Total results
     *
     * @var int
     */
    private $limit;

    /**
     * Start of the scope
     *
     * @var DateTime
     */
    private $start;

    /**
     * End of the scope
     *
     * @var static
     */
    private $end;

    /**
     * Country variable for the regions distribution
     *
     * @var mixed
     */
    private $country;

    public function __construct()
    {
        $this->period = 30;
        $this->limit = 16;
        $this->end = Carbon::today();
        $this->start = Carbon::today()->subDays($this->period);
        $this->country = env('ANALYTICS_COUNTRY');
    }

    public function index()
    {
        $statistics = [
            'keywords' => LaravelAnalytics::getTopKeywords($this->period, $this->limit),
            'referrers' => LaravelAnalytics::getTopReferrers($this->period, $this->limit),
            'browsers' => LaravelAnalytics::getTopBrowsers($this->period, $this->limit),
            'pages' => LaravelAnalytics::getMostVisitedPages($this->period, $this->limit),
            'users' => LaravelAnalytics::getActiveUsers(),
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
            'averages' => $this->getAverages()
        ];
        return view('admin.dashboard.index', compact('statistics'));
    }

    /**
     * Simplify the query
     *
     * @param array $options
     * @param string $metrics
     * @return mixed
     */
    private function query($options = [],$metrics='ga:visits')
    {
        return LaravelAnalytics::performQuery($this->start,$this->end,$metrics,$options)->rows;
    }

    /**
     * Transform analytics array into a collection
     *
     * @param $data
     * @param $fields
     * @param int $offset
     * @return Collection
     */
    private function makeCollection($data,$fields,$offset=1)
    {
        if (is_null($data))
        {
            return new Collection([]);
        }
        else
        {
            foreach ($data as $pageRow)
            {
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
        $options = [
            'dimensions' => 'ga:year',
        ];
        return $this->query($options)[0][1];
    }

    /**
     * Landing pages
     *
     * @return mixed
     */
    private function getLandings()
    {
        $options = [
            'dimensions' => 'ga:landingPagePath',
            'sort' => '-ga:entrances',
            'max-results' => $this->limit
        ];
        $data = $this->query($options,'ga:entrances');
        return $this->makeCollection($data, ['0' => 'path', '1' => 'visits']);
    }

    /**
     * Exit pages
     *
     * @return mixed
     */
    private function getExits()
    {
        $options = [
            'dimensions' => 'ga:exitPagePath',
            'sort' => '-ga:exits',
            'max-results' => $this->limit
        ];
        $data = $this->query($options,'ga:exits');
        return $this->makeCollection($data, ['0' => 'path', '1' => 'visits']);
    }

    /**
     * Time spent on pages
     *
     * @return Collection
     */
    public function getTimeOnPages()
    {
        $options = [
            'dimensions' => 'ga:pagePath',
            'sort' => '-ga:timeOnPage',
            'max-results' => $this->limit
        ];
        $data = $this->query($options, 'ga:timeOnPage');
        return $this->makeCollection($data, ['0' => 'path', '1' => 'time']);
    }

    /**
     * Traffic sources
     *
     * @return mixed
     */
    private function getSources()
    {
        $options = [
            'dimensions' => 'ga:source, ga:medium',
            'sort' => '-ga:visits',
            'max-results' => $this->limit
        ];
        $data = $this->query($options);
        return $this->makeCollection($data, ['0' => 'path', '1' => 'visits'],2);
    }

    /**
     * Operating systems
     *
     * @return mixed
     */
    public function getOperatingSystems()
    {
        $options = [
            'dimensions' => 'ga:operatingSystem',
            'sort' => '-ga:visits',
            'max-results' => $this->limit
        ];
        $data = $this->query($options);
        return $this->makeCollection($data, ['0' => 'os', '1' => 'visits']);
    }

    /**
     * Browsers
     *
     * @return mixed
     */
    public function getBrowsers()
    {
        $options = [
            'dimensions' => 'ga:browser',
            'sort' => '-ga:visits',
            'max-results' => $this->limit
        ];
        $data = $this->query($options);
        return $this->makeCollection($data, ['0' => 'browser', '1' => 'visits']);
    }

    /**
     * Country distribution
     *
     * @return string
     */
    private function getCountries()
    {
        $options = [
            'dimensions' => 'ga:country',
            'sort' => '-ga:visits'
        ];
        $array = $this->query($options);
        $visits = [];
        if(count($array))
        {
            foreach($array as $k => $v)
            {
                $visits[$k] = [$v[0], (int) $v[1]];
            }
        }
        return json_encode($visits);
    }

    /**
     * Daily visits
     *
     * @return string
     */
    private function getDailyVisits()
    {
        $options = [
            'dimensions' => 'ga:date'
        ];
        $array = $this->query($options);
        $visits = [];
        foreach($array as $k => $v)
        {
            $visits[$k]['date']   = Carbon::parse($v['0'])->format('Y-m-d');
            $visits[$k]['visits'] = $v['1'];
        }
        return json_encode($visits);
    }

    /**
     * Region distribution for a specific country
     *
     * @return string
     */
    private function getRegions()
    {
        $options = [
            'dimensions' => 'ga:country, ga:region',
            'sort' => '-ga:visits',
            'filters' => 'ga:country==' . $this->country . ''
        ];
        $array = $this->query($options);
        $visits = [];
        if(count($array))
        {
            foreach($array as $k => $v)
            {
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
        $options = [
            'dimensions' => 'ga:pagePath'
        ];
        $array = $this->query($options,'ga:avgTimeOnPage , ga:entranceBounceRate, ga:pageviewsPerVisit');
        $count = count($array);
        $average = ['time' => 0, 'bounce' => 0, 'visit' => 0];
        if(count($array))
        {
            foreach($array as $v)
            {
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