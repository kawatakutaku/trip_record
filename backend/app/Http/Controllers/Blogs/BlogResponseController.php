<?php

namespace App\Http\Controllers\Blogs;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogResponseRequest;
use App\Http\Requests\UpdateBlogResponseRequest;
use App\Models\BlogResponse;

class BlogResponseController extends Controller
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
     * @param  \App\Http\Requests\StoreBlogResponseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogResponseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogResponse  $blogResponse
     * @return \Illuminate\Http\Response
     */
    public function show(BlogResponse $blogResponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogResponse  $blogResponse
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogResponse $blogResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogResponseRequest  $request
     * @param  \App\Models\BlogResponse  $blogResponse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogResponseRequest $request, BlogResponse $blogResponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogResponse  $blogResponse
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogResponse $blogResponse)
    {
        //
    }
}
