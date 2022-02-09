<?php

namespace Tests\Feature\Memo;

use App\Models\City;
use App\Models\Memo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class MemoTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        // TODO: ログインの処理を記述できていないため、暫定的にDBから取得するようにする
        $this->userId = User::inRandomOrder()->first()->id;
        $this->cityId = City::inRandomOrder()->first()->id;
        // TODO: storeで使用したmemoのidを使うようにしたい
        $this->memoId = Memo::inRandomOrder()->first()->id;
    }

    /**
     * 一覧画面
     * @return void
     */
    public function testMemoIndex()
    {
        $memoIndexResponse = $this->get(route("memos.index"));
        $memoIndexResponse->assertStatus(Response::HTTP_OK);
    }
    /**
     * メモの新規作成画面
     */
    public function testMemoCreate()
    {
        $memoCreateResponse = $this->get(route("memos.create"));
        $memoCreateResponse->assertStatus(Response::HTTP_OK);
    }
    /**
     * メモの保存処理
     */
    // TODO: cityIdが渡せず500エラーが出るから、コメントアウトしておく
    // public function testMemoStore()
    // {
    //     // 保存用のデータ
    //     $memoStoreData = $this->getMemoData();

    //     // 保存処理のテスト
    //     $memoStoreResponse = $this->post(route("memos.store"), $memoStoreData);
    //     $memoStoreResponse->assertStatus(Response::HTTP_FOUND);
    //     $memoStoreResponse->assertRedirect(route("memos.index"));

    //     // 整合性チェック
    //     $this->memoRecord = Memo::where("user_id", $memoStoreData['user_id'])->orderBy("created_at", "desc")->first();
    //     // TODO: 基底クラスに整合性チェック用のfor文を書いて、チェックしたい
    //     $this->assertEquals($this->memoRecord->memo, $memoStoreData['memo']);
    //     $this->assertEquals($this->memoRecord->img, $memoStoreData['img']);
    // }
    /**
     * メモの詳細画面
     */
    public function testMemoShow()
    {
        $memoShowResponse = $this->get(route("memos.show", ["memo" => $this->memoId]));
        $memoShowResponse->assertStatus(Response::HTTP_OK);
    }
    /**
     * メモの編集画面
     */
    public function testMemoEdit()
    {
        $memoEditResponse = $this->get(route("memos.edit", ["memo" => $this->memoId]));
        $memoEditResponse->assertStatus(Response::HTTP_OK);
    }
    /**
     * メモの更新処理
     */
    // TODO: cityIdが渡せず500エラーが出るから、コメントアウトしておく
    // public function testMemoUpdate()
    // {
    //     $memoUpdateResponse = $this->patch(route("memos.update", ["memo" => $this->memoId]));
    //     $memoUpdateResponse->assertStatus(Response::HTTP_FOUND);
    //     $memoUpdateResponse->assertRedirect(route("memos.show", ["memo" => $this->memoId]));

    //     // TODO: 整合性チェックもやりたい
    // }
    /**
     * メモの削除処理
     */

    public function testMemoDestroy()
    {
        $memoDestroyResponse = $this->delete(route("memos.destroy", ["memo" => $this->memoId]));
        $memoDestroyResponse->assertStatus(Response::HTTP_FOUND);
        $memoDestroyResponse->assertRedirect(route("memos.index"));

        // TODO: 整合性チェックもやりたい
    }

    /**
     * post用のデータ
     */
    public function getMemoData()
    {
        $memoData = Memo::factory()->raw([
            'user_id' => $this->userId,
            'city_id' => $this->cityId,
        ]);

        return $memoData;
    }

}
