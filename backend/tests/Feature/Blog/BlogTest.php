<?php

namespace Tests\Feature\Blog;

use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\Feature\BaseFeatureTestCase;
use Tests\TestCase;

class BlogTest extends BaseFeatureTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->blogId = Blog::inRandomOrder()->first()->id;
    }

    /**
     * 一覧画面
     * @return void
     */
    public function testBlogIndex()
    {
        $blogIndexResponse = $this->get(route("blogs.index"));
        $blogIndexResponse->assertStatus(Response::HTTP_OK);
    }

    /**
     * 新規作成画面
     */
    public function testBlogCreate()
    {
        $blogCreateResponse = $this->get(route("blogs.create"));
        $blogCreateResponse->assertStatus(Response::HTTP_OK);
    }

    /**
     * 保存処理
     */
    // public function testBlogStore()
    // {
    //     $blogStoreResponse = $this->post(route("blogs.store"));
    //     $blogStoreResponse->assertStatus(Response::HTTP_FOUND);
    //     $blogStoreResponse->assertRedirect(route("blogs.index"));
    // }

    /**
     * 詳細画面
     */
    public function testBlogShow()
    {
        $blogShowResponse = $this->get(route("blogs.show", ["blog" => $this->blogId]));
        $blogShowResponse->assertStatus(Response::HTTP_OK);
    }

    /**
     * 編集画面
     */
    public function testBlogEdit()
    {
        $blogEditResponse = $this->get(route("blogs.edit", ["blog" => $this->blogId]));
        $blogEditResponse->assertStatus(Response::HTTP_OK);
    }

    /**
     * 更新処理
     */
    // public function testBlogUpdate()
    // {
    //     $blogUpdateResponse = $this->patch(route("blogs.update", ["blog" => $this->blogId]));
    //     $blogUpdateResponse->assertStatus(Response::HTTP_FOUND);
    //     $blogUpdateResponse->assertRedirect(route("blogs.show", ["blog" => $this->blogId]));
    // }

    /**
     * 削除処理
     */
    public function testBlogDestroy()
    {
        $blogDestroyResponse = $this->delete(route("blogs.destroy", ["blog" => $this->blogId]));
        $blogDestroyResponse->assertStatus(Response::HTTP_FOUND);
        $blogDestroyResponse->assertRedirect(route("blogs.index"));
    }
}
