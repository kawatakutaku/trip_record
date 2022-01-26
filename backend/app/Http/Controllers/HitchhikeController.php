<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHitchhikeRequest;
use App\Http\Requests\UpdateHitchhikeRequest;
use App\Models\Hitchhike;

class HitchhikeController extends Controller
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
     * @param  \App\Http\Requests\StoreHitchhikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHitchhikeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hitchhike  $hitchhike
     * @return \Illuminate\Http\Response
     */
    public function show(Hitchhike $hitchhike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hitchhike  $hitchhike
     * @return \Illuminate\Http\Response
     */
    public function edit(Hitchhike $hitchhike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHitchhikeRequest  $request
     * @param  \App\Models\Hitchhike  $hitchhike
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHitchhikeRequest $request, Hitchhike $hitchhike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hitchhike  $hitchhike
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hitchhike $hitchhike)
    {
        //
    }
}
