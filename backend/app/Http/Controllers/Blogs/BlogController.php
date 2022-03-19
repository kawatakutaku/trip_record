<?php

namespace App\Http\Controllers\Blogs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blogs\StoreBlogRequest;
use App\Http\Requests\Blogs\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\City;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BlogController extends Controller
{
     /**
     * ブログの一覧画面
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
     public function index(Request $request): View
     {
          $blog = Blog::where('city_id', $request->cityId)->get();
          return view("blogs.index", [City::CITY_ID_NAME => $request->cityId, Blog::MULTIPLE_BLOGS => $blog]);
     }

     /**
     * ブログの新規作成画面
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
     public function create(Request $request): View
     {
          return view("blogs.create", [City::CITY_ID_NAME => $request->cityId]);
     }

     /**
     * ブログの保存処理
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
     public function store(StoreBlogRequest $request): RedirectResponse
     {
          $blog = new Blog();

          $blog->message = $request->message;
          $user = app(User::class);
          $userId = $user->getAuthAccountId();
          $blog->user_id = $userId;
          $blog->city_id = $request->cityId;
          $blog->created_at = Carbon::now();
          $blog->updated_at = Carbon::now();
          $blog->save();

          return redirect(route("blogs.index", [City::CITY_ID_NAME => $request->cityId]));
     }

     /**
          * ブログの詳細画面
          * @param  \App\Models\Blog  $blog
          * @param \Illuminate\Http\Request $request
          * @return \Illuminate\Http\View
          */
     public function show(Request $request, Blog $blog): View
     {
          return view("blogs.show", [City::CITY_ID_NAME => $request->cityId,  Blog::BLOG_ID_NAME => $blog]);
     }

     /**
          * ブログの編集画面
          * @param  \App\Models\Blog  $blog
          * @param \Illuminate\Http\Request $request
          * @return \Illuminate\Http\View
          */
     public function edit(Request $request, Blog $blog): View
     {
          return view("blogs.edit", [City::CITY_ID_NAME => $request->cityId,  Blog::BLOG_ID_NAME => $blog]);
     }

     /**
     * ブログの更新処理
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\RedirectResponse
     */
     public function update(UpdateBlogRequest $request, Blog $blog): RedirectResponse
     {
          $blog->message = $request->message;
          $user = app(User::class);
          $userId = $user->getAuthAccountId();
          $blog->user_id = $userId;
          $blog->city_id = $request->cityId;
          $blog->updated_at = Carbon::now();
          $blog->save();

          return redirect(route("blogs.show", [City::CITY_ID_NAME => $request->cityId, Blog::BLOG_ID_NAME => $blog]));
     }

     /**
     * ブログの削除処理
     * @param  \App\Models\Blog  $blog
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
     public function destroy(Request $request, Blog $blog): RedirectResponse
     {
          $blog->delete();

          return redirect(route("blogs.index", [City::CITY_ID_NAME => $request->cityId]));
     }
}
