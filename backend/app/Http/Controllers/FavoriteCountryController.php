<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFavoriteCountryRequest;
use App\Http\Requests\UpdateFavoriteCountryRequest;
use App\Models\FavoriteCountry;

class FavoriteCountryController extends Controller
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
     * @param  \App\Http\Requests\StoreFavoriteCountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFavoriteCountryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FavoriteCountry  $favoriteCountry
     * @return \Illuminate\Http\Response
     */
    public function show(FavoriteCountry $favoriteCountry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FavoriteCountry  $favoriteCountry
     * @return \Illuminate\Http\Response
     */
    public function edit(FavoriteCountry $favoriteCountry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFavoriteCountryRequest  $request
     * @param  \App\Models\FavoriteCountry  $favoriteCountry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFavoriteCountryRequest $request, FavoriteCountry $favoriteCountry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FavoriteCountry  $favoriteCountry
     * @return \Illuminate\Http\Response
     */
    public function destroy(FavoriteCountry $favoriteCountry)
    {
        //
    }
}
