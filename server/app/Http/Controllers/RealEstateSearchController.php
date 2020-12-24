<?php

namespace App\Http\Controllers;

use App\Enums\Prefecture;
use App\Http\Requests\RealEstateSearchRequest;
use App\PrefectureApi\PrefectureSearch;

class RealEstateSearchController extends Controller
{
    public function index(PrefectureSearch $prefectureSearch, RealEstateSearchRequest $request)
    {
        $prefectures = Prefecture::PREFECTURES;
        $cities = '';
        if ($request->input('prefecture')) {
            $code = $request->input('prefecture');
            $cities = $prefectureSearch->citySearch((string)$code);
        }

        return view('real_estate.index', [
            'prefectures' => $prefectures,
            'cities'      => $cities,
        ]);
    }
}
