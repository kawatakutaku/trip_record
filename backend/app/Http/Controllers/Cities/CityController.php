<?php

namespace App\Http\Controllers\Cities;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cities\SelectCityRequest;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CityController extends Controller
{
    /**
     * 都市の選択画面
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        $prefectures = City::all();
        return view("cities.city", ["prefectures" => $prefectures]);
    }

    /**
     * 都市の選択処理
     */
    // TODO: メソッド名はこれで良いのか検討
    public function post(SelectCityRequest $request)
    {
        /**
         * city_idをpostで受け取って、そのidを元にして、memoのindexを表示するようにしたい
         */

        //  TODO: 絞り込みをしてmemoのindexのページで表示したい => というか、むしろindexのページで絞り込みをできるようにする方が良さそう？
        // $requestではnameにidが格納されて渡ってくる
        return redirect()->route("memos.index", ['cityId' => $request->name]);
    }

}
