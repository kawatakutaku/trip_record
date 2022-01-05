<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    // 旅行作成の入力画面を表示する処理
    public function create() {
        return view('trips.create');
    }

    // TODO repositoryなどで、DB登録を行うようにする
    // 旅行作成処理を実行する
    public function store(Request $request) {
        // Tripモデルのインスタンスを作成する
        $trip = new Trip();

        // TODO セッションなどから、ユーザー情報を取得する方法を採用する(今の状態だと、認証中の全ユーザーを取得してしまう)
        $userId = Auth::id();


        // requestから渡ってきた値をモデルのインスタンスに登録している
        $trip->trip_name = $request->trip_name;
        $trip->start_day = $request->start_day;
        $trip->end_day = $request->end_day;
        $trip->user_id = $userId;

        // DBに保存している
        $trip->save();

        return redirect()->route('mypage');
    }

    // TODO updateとdeleteの部分を記述する
}
