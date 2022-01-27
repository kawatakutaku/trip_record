<?php

namespace App\Http\Controllers\Hitchhikes\Doings;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSuccessRequest;
use App\Http\Requests\UpdateSuccessRequest;
use App\Models\Success;

class SuccessController extends Controller
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
     * @param  \App\Http\Requests\StoreSuccessRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuccessRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Success  $success
     * @return \Illuminate\Http\Response
     */
    public function show(Success $success)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Success  $success
     * @return \Illuminate\Http\Response
     */
    public function edit(Success $success)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuccessRequest  $request
     * @param  \App\Models\Success  $success
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuccessRequest $request, Success $success)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Success  $success
     * @return \Illuminate\Http\Response
     */
    public function destroy(Success $success)
    {
        //
    }
}
