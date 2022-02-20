<?php

namespace Tests\Feature\Blog;

use App\Models\Blog;
use App\Models\City;
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

        $this->cityId = City::inRandomOrder()->first()->id;
    }

    /**
     * ブログのシナリオテスト
     * @test
     * @group blog
     * @return void
     */
    public function testBlog(): void
    {
        $this->blogIndex();
        $this->blogCreate();
        $this->blogStore();
        $this->blogShow();
        $this->blogEdit();
        $this->blogUpdate();
        $this->blogDestroy();
    }

    /**
     * 一覧画面
     * @test
     * @group blog
     * @return void
     */
    private function blogIndex(): void
    {
        $blogIndexResponse = $this->get(route("blogs.index", [City::CITY_ID_NAME => $this->cityId]));
        $blogIndexResponse->assertStatus(Response::HTTP_OK);
    }

    /**
     * 新規作成画面
     * @test
     * @group blog
     * @return void
     */
    private function blogCreate(): void
    {
        $blogCreateResponse = $this->get(route("blogs.create", [City::CITY_ID_NAME => $this->cityId]));
        $blogCreateResponse->assertStatus(Response::HTTP_OK);
    }

    /**
     * 保存処理
     * @test
     * @group blog
     * @return void
     */
    private function blogStore(): void
    {
        $blogStoreData = $this->getBlogData();

        // 保存処理のテスト
        $blogStoreResponse = $this->post(route("blogs.store", [City::CITY_ID_NAME => $this->cityId]), $blogStoreData);
        $blogStoreResponse->assertStatus(Response::HTTP_FOUND);
        $blogStoreResponse->assertRedirect(route("blogs.index", [City::CITY_ID_NAME => $this->cityId]));

        // 整合性チェック
        $this->blogStored = Blog::orderBy("created_at", "desc")->first();
        $this->assertEquals($this->blogStored->message, $blogStoreData[Blog::BLOG_MESSAGE]);
    }

    /**
     * 詳細画面
     * @test
     * @group blog
     * @return void
     */
    private function blogShow(): void
    {
        $blogShowResponse = $this->get(route("blogs.show", [City::CITY_ID_NAME => $this->cityId, Blog::BLOG_ID_NAME => $this->blogStored->id]));
        $blogShowResponse->assertStatus(Response::HTTP_OK);
    }

    /**
     * 編集画面
     * @test
     * @group blog
     * @return void
     */
    private function blogEdit(): void
    {
        $blogEditResponse = $this->get(route("blogs.edit", [City::CITY_ID_NAME => $this->cityId, Blog::BLOG_ID_NAME => $this->blogStored->id]));
        $blogEditResponse->assertStatus(Response::HTTP_OK);
    }

    /**
     * 更新処理
     * @test
     * @group blog
     * @return void
     */
    private function blogUpdate(): void
    {
        $blogUpdateData = $this->getBlogData();

        // 更新処理のテスト
        $blogUpdateResponse = $this->patch(route("blogs.update", [City::CITY_ID_NAME => $this->cityId, Blog::BLOG_ID_NAME => $this->blogStored->id]), $blogUpdateData);
        $blogUpdateResponse->assertStatus(Response::HTTP_FOUND);
        $blogUpdateResponse->assertRedirect(route("blogs.show", [City::CITY_ID_NAME => $this->cityId, Blog::BLOG_ID_NAME => $this->blogStored->id]));

        // 整合性チェック
        $blogUpdated = Blog::find($this->blogStored->id);
        $this->assertEquals($blogUpdated->message, $blogUpdateData[Blog::BLOG_MESSAGE]);
    }

    /**
     * 削除処理
     * @test
     * @group blog
     * @return void
     */
    private function blogDestroy(): void
    {
        $blogDestroyResponse = $this->delete(route("blogs.destroy", [City::CITY_ID_NAME => $this->cityId, Blog::BLOG_ID_NAME => $this->blogStored->id]));
        $blogDestroyResponse->assertStatus(Response::HTTP_FOUND);
        $blogDestroyResponse->assertRedirect(route("blogs.index", [City::CITY_ID_NAME => $this->cityId]));

        // 整合性チェック
        $blogDestroyed = Blog::find($this->blogStored->id);
        $this->assertNull($blogDestroyed);
    }

    /**
     * ブログのデータ
     * @return array
     */
    public function getBlogData(): array
    {
        $blogData = Blog::factory()->raw();

        return $blogData;
    }
}
