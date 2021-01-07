<?php


namespace App\PrefectureApi;

use GuzzleHttp\Client;

class PrefectureSearch
{
    /**
     * PrefectureSearch constructor.
     */
    public function __construct()
    {
        $this->client = new Client;
    }

    /**
     * @param string $cityCode
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function citySearch(string $cityCode)
    {
        $url = 'https://www.land.mlit.go.jp/webland/api/CitySearch?area=' . urlencode($cityCode);
        $method = 'GET';

        $response = $this->client->request($method, $url);
        $cities = $response->getBody();
        $cities = json_decode($cities, true)['data'];

        return $cities;
    }
}