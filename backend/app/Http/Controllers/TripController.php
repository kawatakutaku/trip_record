<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    // 旅行作成の入力画面を表示する処理
    public function create() {
        return view('TripsCreate');
    }

    // TODO repositoryなどで、DB登録を行うようにする
    // 旅行作成処理を実行する
    public function store(Request $request) {
        // Tripモデルのインスタンスを作成する
        $trip = new Trip();

        // requestから渡ってきた値をモデルのインスタンスに登録している
        $trip->trip_name = $request->trip_name;
        $trip->start_day = $request->start_day;
        $trip->end_day = $request->end_day;

        // DBに保存している
        $trip->save();

        return redirect()->route('mypage');
    }
}
