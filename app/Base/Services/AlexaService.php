<?php

namespace App\Base\Services;

use GuzzleHttp\Client as GuzzleClient;
use SimpleXMLElement;

class AlexaService
{
    /**
     * @param      $url
     *
     * @return array
     * @throws \Exception
     */
    public static function getAlexaRank($url) : array
    {
        if (!empty($url)) {
            return cache()->remember('alexa_rankings', 86400, function () use ($url) {
                $client = static::getAlexaClient();
                $body = $client->get($website = 'http://data.alexa.com/data?cli=10&url=' . $url)->getBody();
                $xml =  new SimpleXMLElement($body->getContents());
                if (isset($xml->SD)) {
                    $worldRank  = (int) $xml->SD->REACH->attributes()['RANK'];
                    $turkeyRank = (int) $xml->SD->COUNTRY->attributes()['RANK'];
                    return [$turkeyRank, $worldRank];
                }
                return [0, 0];
            });
        }
        return [0, 0];
    }

    /**
     * @return \GuzzleHttp\Client
     */
    private static function getAlexaClient() : GuzzleClient
    {
        return new GuzzleClient([
            'headers' => ['User-Agent' => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36'],
            'http_errors' => false,
            'verify' => false,
            'connect_timeout' => 120,
            'read_timeout' => 120,
            'timeout' => 120
        ]);
    }
}
