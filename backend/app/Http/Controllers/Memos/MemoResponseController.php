<?php

namespace App\Http\Controllers\Memos;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemoResponseRequest;
use App\Http\Requests\UpdateMemoResponseRequest;
use App\Models\MemoResponse;

class MemoResponseController extends Controller
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
     * @param  \App\Http\Requests\StoreMemoResponseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemoResponseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemoResponse  $memoResponse
     * @return \Illuminate\Http\Response
     */
    public function show(MemoResponse $memoResponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemoResponse  $memoResponse
     * @return \Illuminate\Http\Response
     */
    public function edit(MemoResponse $memoResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemoResponseRequest  $request
     * @param  \App\Models\MemoResponse  $memoResponse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemoResponseRequest $request, MemoResponse $memoResponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemoResponse  $memoResponse
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemoResponse $memoResponse)
    {
        //
    }
}
