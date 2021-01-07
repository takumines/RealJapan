<?php


namespace App\MlitApi;


use GuzzleHttp\Client;

class MlitApi
{
    /**
     * MlitApi constructor.
     */
    public function __construct()
    {
        $this->client = new Client;
    }

    public function mlitList(string $prefectureCode)
    {
        // TODO: パラメータのfromを現在時刻の年数から生成
        // TODO: パラメータのtoをfromから5年を引いた年数で生成

        // TODO: $urlのパラメータにfrom, to, $prefectureCodeを設定する
        $url = 'https://www.land.mlit.go.jp/webland/api/TradeListSearch?f';
    }
}