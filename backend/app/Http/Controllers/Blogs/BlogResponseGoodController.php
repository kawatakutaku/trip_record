<?php

namespace App\Http\Controllers\Blogs;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogResponseGoodRequest;
use App\Http\Requests\UpdateBlogResponseGoodRequest;
use App\Models\BlogResponseGood;

class BlogResponseGoodController extends Controller
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
     * @param  \App\Http\Requests\StoreBlogResponseGoodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogResponseGoodRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogResponseGood  $blogResponseGood
     * @return \Illuminate\Http\Response
     */
    public function show(BlogResponseGood $blogResponseGood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogResponseGood  $blogResponseGood
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogResponseGood $blogResponseGood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogResponseGoodRequest  $request
     * @param  \App\Models\BlogResponseGood  $blogResponseGood
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogResponseGoodRequest $request, BlogResponseGood $blogResponseGood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogResponseGood  $blogResponseGood
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogResponseGood $blogResponseGood)
    {
        //
    }
}
