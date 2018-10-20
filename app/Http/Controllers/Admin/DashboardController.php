<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use Analytics;
use App\Base\Services\AlexaService;
use Cache;
use Carbon\Carbon;
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
        $end = Carbon::now();
        $this->limit = 20;
        $this->period = Period::create($end->copy()->startOfDay()->subDays(30), $end);
        $this->country = env('GOOGLE_ANALYTICS_COUNTRY');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function getIndex()
    {
        if (strpos(env('GOOGLE_ANALYTICS_CREDENTIAL_PATH'), '*') === false) {
            return view('admin.dashboard', [
                'statistics' => $this->getStatistics(),
                'today' => $this->getToday()
            ]);
        }
        $this->flashRaw(__('admin.invalid'));
        return redirect(route('admin.user.index'));
    }

    /**
     * @param array  $options
     * @param string $metrics
     *
     * @return mixed
     */
    protected function query($options = [], $metrics = 'ga:visits')
    {
        return Analytics::performQuery($this->period, $metrics, $options)->rows;
    }

    /**
     * @param       $data
     * @param       $fields
     * @param int   $offset
     * @param array $keywordData
     *
     * @return \Illuminate\Support\Collection
     */
    protected function makeCollection($data, $fields, $offset = 1, array $keywordData = []): \Illuminate\Support\Collection
    {
        if ($data === null) {
            return collect([]);
        }
        foreach ($data as $pageRow) {
            $keywordData[] = [$fields[0] => $pageRow[0], $fields[1] => $pageRow[$offset]];
        }
        return collect($keywordData);
    }

    /**
     * @return float|int
     */
    private function getTotalVisits()
    {
        $result = $this->query(['dimensions' => 'ga:year']);
        return $result ? array_sum(array_column($result, 1)) : 0;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    private function getTopKeywords(): \Illuminate\Support\Collection
    {
        $options = ['dimensions' => 'ga:keyword', 'sort' => '-ga:sessions', 'max-results' => $this->limit];
        return $this->makeCollection($this->query($options, 'ga:sessions'), ['0' => 'keyword', '1' => 'sessions']);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    private function getLandings(): \Illuminate\Support\Collection
    {
        $options = ['dimensions' => 'ga:landingPagePath', 'sort' => '-ga:entrances', 'max-results' => $this->limit];
        return $this->makeCollection($this->query($options, 'ga:entrances'), ['0' => 'path', '1' => 'visits']);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    private function getExits(): \Illuminate\Support\Collection
    {
        $options = ['dimensions' => 'ga:exitPagePath', 'sort' => '-ga:exits', 'max-results' => $this->limit];
        return $this->makeCollection($this->query($options, 'ga:exits'), ['0' => 'path', '1' => 'visits']);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    private function getTimeOnPages(): \Illuminate\Support\Collection
    {
        $options = ['dimensions' => 'ga:pagePath', 'sort' => '-ga:timeOnPage', 'max-results' => $this->limit];
        return $this->makeCollection($this->query($options, 'ga:timeOnPage'), ['0' => 'path', '1' => 'time']);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    private function getSources(): \Illuminate\Support\Collection
    {
        $options = ['dimensions' => 'ga:source, ga:medium', 'sort' => '-ga:visits', 'max-results' => $this->limit];
        return $this->makeCollection($this->query($options), ['0' => 'path', '1' => 'visits'], 2);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    private function getOperatingSystems(): \Illuminate\Support\Collection
    {
        $options = ['dimensions' => 'ga:operatingSystem', 'sort' => '-ga:visits', 'max-results' => $this->limit];
        return $this->makeCollection($this->query($options), ['0' => 'os', '1' => 'visits']);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    private function getBrowsers(): \Illuminate\Support\Collection
    {
        $options = ['dimensions' => 'ga:browser', 'sort' => '-ga:visits', 'max-results' => $this->limit];
        return $this->makeCollection($this->query($options), ['0' => 'browser', '1' => 'visits']);
    }

    /**
     * @param array $visits
     *
     * @return false|string
     */
    private function getCountries(array $visits = [])
    {
        $array = $this->query(['dimensions' => 'ga:country', 'sort' => '-ga:visits']);
        if (\count($array)) {
            foreach ($array as $k => $v) {
                $visits[$k] = [$v[0], (int) $v[1]];
            }
        }
        return json_encode($visits);
    }

    /**
     * @param array $visits
     *
     * @return false|string
     */
    private function getDailyVisits(array $visits = [])
    {
        $array = $this->query(['dimensions' => 'ga:date']);
        if (\count($array)) {
            foreach ($array as $k => $v) {
                $visits[$k]['date'] = Carbon::parse($v['0'])->format('Y-m-d');
                $visits[$k]['visits'] = $v['1'];
            }
        }
        return json_encode($visits);
    }

    /**
     * @param array $visits
     *
     * @return false|string
     */
    private function getRegions(array $visits = [])
    {
        $options = [
            'dimensions' => 'ga:country, ga:region',
            'sort' => '-ga:visits',
            'filters' => 'ga:country==' . $this->country . ''
        ];
        $array = $this->query($options);
        if (\count($array)) {
            foreach ($array as $k => $v) {
                $visits[$k] = [str_replace(' Province', '', $v[1]), (int) $v[2]];
            }
        }
        return json_encode($visits);
    }

    /**
     * @return array
     */
    private function getAverages(): array
    {
        $collection = collect(
            $this->query(
                ['dimensions' => 'ga:pagePath'],
                'ga:avgSessionDuration, ga:entranceBounceRate, ga:pageviewsPerVisit'
            )
        );
        return [
            'session' => round($collection->avg(1), 2),
            'bounce' => round($collection->avg(2), 2),
            'visit' => round($collection->avg(3), 2)
        ];
    }

    /**
     * @return mixed
     */
    private function getStatistics()
    {
        return Cache::remember('analytics', $this->getCache(), function () {
            return [
                'referrers' => Analytics::fetchTopReferrers($this->period, $this->limit),
                'pages' => Analytics::fetchMostVisitedPages($this->period, $this->limit),
                'total_visits' => $this->getTotalVisits(),
                'landings' => $this->getLandings(),
                'alexa' => AlexaService::getAlexaRank(env('APP_URL')),
                'exits' => $this->getExits(),
                'times' => $this->getTimeOnPages(),
                'sources' => $this->getSources(),
                'browsers' => $this->getBrowsers(),
                'os' => $this->getOperatingSystems(),
                'countries' => $this->getCountries(),
                'visits' => $this->getDailyVisits(),
                'regions' => $this->getRegions(),
                'keywords' => $this->getTopKeywords(),
                'averages' => $this->getAverages()
            ];
        });
    }

    /**
     * @return mixed
     */
    private function getToday()
    {
        return Cache::remember('today', $this->getCache(), function () {
            try {
                $this->period = Period::create(Carbon::now()->startOfDay(), Carbon::now());
                return $this->getTotalVisits();
            } catch (\Exception $e) {
                return 0;
            }
        });
    }

    /**
     * @return int
     */
    private function getCache(): int
    {
        return env('APP_ENV') === 'local' ? 120 : 10;
    }
}
