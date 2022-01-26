<?php

namespace App\Http\Controllers\Hitchhikes\Doings;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHikerReviewRequest;
use App\Http\Requests\UpdateHikerReviewRequest;
use App\Models\HikerReview;

class HikerReviewController extends Controller
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
     * @param  \App\Http\Requests\StoreHikerReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHikerReviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HikerReview  $hikerReview
     * @return \Illuminate\Http\Response
     */
    public function show(HikerReview $hikerReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HikerReview  $hikerReview
     * @return \Illuminate\Http\Response
     */
    public function edit(HikerReview $hikerReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHikerReviewRequest  $request
     * @param  \App\Models\HikerReview  $hikerReview
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHikerReviewRequest $request, HikerReview $hikerReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HikerReview  $hikerReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(HikerReview $hikerReview)
    {
        //
    }
}
