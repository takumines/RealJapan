<?php

namespace App\Http\Controllers;

use App\Enums\Prefecture;
use App\Http\Requests\RealEstateSearchRequest;
use App\PrefectureApi\PrefectureSearch;

class RealEstateSearchController extends Controller
{
    /**
     * 検索画面
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $prefectures = Prefecture::PREFECTURES;

        return view('real_estate.index', [
            'prefectures' => $prefectures,
        ]);
    }

    /**
     * 都道府県APIを叩く
     *
     * @param PrefectureSearch $prefectureSearch
     * @param RealEstateSearchRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchCity(PrefectureSearch $prefectureSearch, RealEstateSearchRequest $request)
    {
        $code = $request->input('prefecture');
        $cities = $prefectureSearch->citySearch((string)$code);
        $data = response()->json($cities);

        return $data;
    }
}
