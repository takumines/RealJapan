<?php


namespace App\MlitApi;


use Carbon\Carbon;
use GuzzleHttp\Client;

class MlitApi
{
    /**
     * MlitApi constructor.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     *
     *
     * @param string $prefectureCode
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function mlitList(string $prefectureCode)
    {
        $now = Carbon::now();
        $fiveYearsAgo = $now->subYears(5);

        $fromYear = $fiveYearsAgo->format('Y');
        $fromQuarter = $fiveYearsAgo->quarter;
        $from = $fromYear . $fromQuarter;

        $toYear = $now->format('Y');
        $toQuarter = $now->quarter;
        $to = $toYear . $toQuarter;

        $url = 'https://www.land.mlit.go.jp/webland/api/TradeListSearch?from=' . $from . '&to=' . $to . '&area=' . $prefectureCode;
        $method = 'GET';

        $response = $this->client->request($method, $url);
        $mlitList = $response->getBody();
        $mlitList = json_decode($mlitList, true)['data'];

        return $mlitList;
    }
}