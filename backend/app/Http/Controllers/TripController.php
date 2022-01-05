<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 旅行作成の入力画面を表示する処理
        return view('trip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        return redirect()->route('mypage', [ 'id' => $trip->id ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('trips.{$trip_id}.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $trip = Trip::find($id);

        return view('trips.edit', compact("trip"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
