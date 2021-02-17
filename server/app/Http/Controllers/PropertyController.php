<?php

namespace App\Http\Controllers;

use App\Enums\Prefecture;
use App\Http\Requests\RealEstateSearchRequest;
use App\Models\Property;
use App\PrefectureApi\PrefectureSearch;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PropertyController extends Controller
{
    /**
     * 検索画面
     *
     * @return mixed
     */
    public function index()
    {
        $prefectures = Prefecture::PREFECTURES;

        return view('property.index', [
            'prefectures' => $prefectures,
        ]);
    }

    /**
     * @param Request $request
     * @param Property $property
     * @return mixed
     */
    public function search(Request $request, Property $property)
    {
        $searchPrice = $request->input('price');
        $searchSquareMeters = $request->input('square_meters');

        $resultData = [];
        $resultData['area'] = $area = $request->input('area');
        $resultData['propertyType'] = $propertyType = $request->input('property_type');
        // 物件の取得
        $properties = $property
            ->where('district_name', $area)
            ->where('type', $propertyType)
            ->get();

        $resultData['prefecture'] = $prefecture = $properties->pluck('prefecture')->unique()->first();
        $resultData['city'] = $city = $properties->pluck('municipality')->unique()->first();

        // 平均平米単価
        $resultData['avg_unit_price'] = $avgUnitPrice = $properties->pluck('unit_price')->avg();
        // ユーザーが想定している平米単価
        $resultData['search_unit_price'] = $searchUnitPrice = $searchPrice * $searchSquareMeters;

        return view('property.search', [
            'resultData' => $resultData,
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
    public function searchCity(RealEstateSearchRequest $request, PrefectureSearch $prefectureSearch): JsonResponse
    {
        $code = $request->input('prefecture');
        $cities = $prefectureSearch->citySearch((string)$code);
        $data = response()->json($cities);

        return $data;
    }

    /**
     * 地域情報を取得する
     *
     * @param Request $request
     * @param Property $property
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchArea(Request $request, Property $property):JsonResponse
    {
        $code = $request->input('city');
        $areas = $property->where('municipality_code', $code)->get()->pluck('district_name')->unique();
        Cache::forever($code, array_unique($areas->all()));
        $data = response()->json($areas);

        return $data;
    }

    /**
     * @param Request $request
     * @param Property $property
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchPropertyType(Request $request, Property $property): JsonResponse
    {
        $areaName = $request->input('areaName');
        $propertyTypes = $property->where('district_name', $areaName)->get()->pluck('type')->unique();
        $data = response()->json($propertyTypes);

        return $data;
    }
}
