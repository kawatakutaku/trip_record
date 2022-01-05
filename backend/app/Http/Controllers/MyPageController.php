<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class MyPageController extends Controller
{
    public function __invoke()
    {
        // 全部の旅行情報を取得している
        $trips = Trip::all();

        return view('mypage', [
            'trips' => $trips,
        ]);
    }
}
