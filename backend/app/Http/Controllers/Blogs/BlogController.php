<?php

namespace App\Http\Controllers\Blogs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blogs\StoreBlogRequest;
use App\Http\Requests\Blogs\UpdateBlogRequest;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view("blogs.index", ["blogs" => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("blogs.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request, string $cityId)
    {
        $blog = new Blog();

        $blog->message = $request->message;
        $userId = Auth::id();
        $blog->user_id = $userId;
        $blog->city_id = $cityId;
        $blog->created_at = Carbon::now();
        $blog->updated_at = Carbon::now();
        $blog->save();

        return redirect("blogs.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view("blogs.show", ["blog" => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view("blogs.edit", ["blog" => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog, string $cityId)
    {
        $blog = Blog::find($blog);

        $blog->message = $request->message;
        $userId = Auth::id();
        $blog->user_id = $userId;
        $blog->city_id = $cityId;
        $blog->created_at = Carbon::now();
        $blog->updated_at = Carbon::now();
        $blog->save();

        return redirect(route("blogs.show", ["blog" => $blog]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect(route("blogs.index"));
    }
}
