<?php

namespace App\Http\Controllers\Blogs;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogGoodRequest;
use App\Http\Requests\UpdateBlogGoodRequest;
use App\Models\BlogGood;

class BlogGoodController extends Controller
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
     * @param  \App\Http\Requests\StoreBlogGoodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogGoodRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogGood  $blogGood
     * @return \Illuminate\Http\Response
     */
    public function show(BlogGood $blogGood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogGood  $blogGood
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogGood $blogGood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogGoodRequest  $request
     * @param  \App\Models\BlogGood  $blogGood
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogGoodRequest $request, BlogGood $blogGood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogGood  $blogGood
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogGood $blogGood)
    {
        //
    }
}
