<?php


namespace App\PrefectureApi;



use GuzzleHttp\Client;

class PrefectureSearch
{
    public function __construct()
    {
        $this->client = new Client;
    }

    public function citySearch(string $cityCode)
    {
        $url = 'https://www.land.mlit.go.jp/webland/api/CitySearch?area=' . urlencode($cityCode);
        $method = 'GET';

        $response = $this->client->request($method, $url);
        $cities = $response->getBody();
        $cities = json_decode($cities, true)['data'];

        return $cities;
    }

    // 必要ないかも
//    public function areaSearch(string $cityCode, string $areaCode)
//    {
//        $url = 'https://www.land.mlit.go.jp/webland/api/CitySearch?area=' .$cityCode;
//        $method = 'GET';
//
//        $response = $this->client->request($method, $url);
//        $areas = $response->getBody();
//        $areas = json_decode($areas, true)['data'];
//
//        return $areas;
//    }
}