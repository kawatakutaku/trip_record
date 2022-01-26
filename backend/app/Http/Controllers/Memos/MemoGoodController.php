<?php

namespace App\Http\Controllers\Memos;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemoGoodRequest;
use App\Http\Requests\UpdateMemoGoodRequest;
use App\Models\MemoGood;

class MemoGoodController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMemoGoodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemoGoodRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemoGood  $memoGood
     * @return \Illuminate\Http\Response
     */
    public function show(MemoGood $memoGood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemoGood  $memoGood
     * @return \Illuminate\Http\Response
     */
    public function edit(MemoGood $memoGood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemoGoodRequest  $request
     * @param  \App\Models\MemoGood  $memoGood
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemoGoodRequest $request, MemoGood $memoGood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemoGood  $memoGood
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemoGood $memoGood)
    {
        //
    }
}
