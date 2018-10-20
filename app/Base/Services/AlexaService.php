<?php

namespace App\Base\Services;

use GuzzleHttp\Client as GuzzleClient;
use SimpleXMLElement;
use Symfony\Component\DomCrawler\Crawler;

class AlexaService
{
    /**
     * @var array
     */
    protected static $default = [999999999, 999999999];

    /**
     * @param      $website
     * @param bool $useXml
     *
     * @return array
     * @throws \Exception
     */
    public static function getAlexaRank($website, $useXml = false) : array
    {
        if (!empty($website)) {
            return $useXml ? static::getDataByXml($website, $useXml) : static::getDataByCrawler($website);
        }
        return static::$default;
    }

    /**
     * @param      $url
     * @param bool $isXml
     *
     * @return mixed
     * @throws \Exception
     */
    private static function getDataByXml($url, $isXml = false)
    {
        return cache()->remember('alexa_rankings_' . $url, 360, function () use ($url, $isXml) {
            $client = static::getAlexaClient();
            $body = $client->get($website = 'https://data.alexa.com/data?cli=10&url=' . $url)->getBody();
            $xml =  $isXml ? new SimpleXMLElement($body->getContents()) : json_decode($body);
            if (isset($xml->SD->COUNTRY)) {
                $worldRank  = (int) $xml->SD->REACH->attributes()['RANK'];
                $localRank = (int) $xml->SD->COUNTRY->attributes()['RANK'];
                if ($localRank > 0) {
                    return [$localRank, $worldRank];
                }
            }
            return static::$default;
        });
    }

    /**
     * @param $url
     *
     * @return mixed
     * @throws \Exception
     */
    private static function getDataByCrawler($url)
    {
        return cache()->remember('alexa_rankings_' . $url, 360, function () use ($url) {
            [$client, $crawler] = [static::getAlexaClient(), new Crawler()];
            $crawler->addHtmlContent($client->get('https://alexa.com/siteinfo/' . $url)->getBody());
            $data = $crawler->filter('.metrics-data')->each(function ($node, $i) {
                return str_replace(',', '', strip_tags($node->text()));
            });
            if (\count($data) > 0 && $data[1] > 0) {
                return [$data[1], $data[0]];
            }
            return static::$default;
        });
    }

    /**
     * @return \GuzzleHttp\Client
     */
    private static function getAlexaClient(): GuzzleClient
    {
        return new GuzzleClient([
            'headers' => ['User-Agent' => 'Chrome/42.0.2311.135 Safari/537.36 Edge/12.246'],
            'connect_timeout' => 60,
            'read_timeout' => 60,
            'timeout' => 60
        ]);
    }
}
