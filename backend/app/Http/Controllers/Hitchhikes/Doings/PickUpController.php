<?php

namespace App\Http\Controllers\Hitchhikes\Doings;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePickUpRequest;
use App\Http\Requests\UpdatePickUpRequest;
use App\Models\PickUp;

class PickUpController extends Controller
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
     * @param  \App\Http\Requests\StorePickUpRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePickUpRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PickUp  $pickUp
     * @return \Illuminate\Http\Response
     */
    public function show(PickUp $pickUp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PickUp  $pickUp
     * @return \Illuminate\Http\Response
     */
    public function edit(PickUp $pickUp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePickUpRequest  $request
     * @param  \App\Models\PickUp  $pickUp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePickUpRequest $request, PickUp $pickUp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PickUp  $pickUp
     * @return \Illuminate\Http\Response
     */
    public function destroy(PickUp $pickUp)
    {
        //
    }
}
