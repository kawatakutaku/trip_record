<?php

namespace App\Http\Controllers\Memos;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemoResponseGoodRequest;
use App\Http\Requests\UpdateMemoResponseGoodRequest;
use App\Models\MemoResponseGood;

class MemoResponseGoodController extends Controller
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
     * @param  \App\Http\Requests\StoreMemoResponseGoodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemoResponseGoodRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemoResponseGood  $memoResponseGood
     * @return \Illuminate\Http\Response
     */
    public function show(MemoResponseGood $memoResponseGood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemoResponseGood  $memoResponseGood
     * @return \Illuminate\Http\Response
     */
    public function edit(MemoResponseGood $memoResponseGood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemoResponseGoodRequest  $request
     * @param  \App\Models\MemoResponseGood  $memoResponseGood
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemoResponseGoodRequest $request, MemoResponseGood $memoResponseGood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemoResponseGood  $memoResponseGood
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemoResponseGood $memoResponseGood)
    {
        //
    }
}
