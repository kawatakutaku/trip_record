<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriverReviewRequest;
use App\Http\Requests\UpdateDriverReviewRequest;
use App\Models\DriverReview;

class DriverReviewController extends Controller
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
     * @param  \App\Http\Requests\StoreDriverReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriverReviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DriverReview  $driverReview
     * @return \Illuminate\Http\Response
     */
    public function show(DriverReview $driverReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DriverReview  $driverReview
     * @return \Illuminate\Http\Response
     */
    public function edit(DriverReview $driverReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDriverReviewRequest  $request
     * @param  \App\Models\DriverReview  $driverReview
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriverReviewRequest $request, DriverReview $driverReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DriverReview  $driverReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverReview $driverReview)
    {
        //
    }
}
