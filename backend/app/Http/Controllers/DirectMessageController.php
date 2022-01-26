<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDirectMessageRequest;
use App\Http\Requests\UpdateDirectMessageRequest;
use App\Models\DirectMessage;

class DirectMessageController extends Controller
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
     * @param  \App\Http\Requests\StoreDirectMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDirectMessageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DirectMessage  $directMessage
     * @return \Illuminate\Http\Response
     */
    public function show(DirectMessage $directMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DirectMessage  $directMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(DirectMessage $directMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDirectMessageRequest  $request
     * @param  \App\Models\DirectMessage  $directMessage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDirectMessageRequest $request, DirectMessage $directMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DirectMessage  $directMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(DirectMessage $directMessage)
    {
        //
    }
}
