<?php

namespace Tests\Feature\Memo;

use App\Models\City;
use App\Models\Memo;
use App\Models\MemoLike;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\Feature\BaseFeatureTestCase;
use Tests\TestCase;

class MemoTest extends BaseFeatureTestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        $this->cityId = City::inRandomOrder()->first()->id;
    }

    /**
     * メモのシナリオテスト
     * @test
     * @group memo
     * @return void
     */
    public function testMemo(): void
    {
        $this->memoIndex();
        $this->memoCreate();
        $this->memoStore();
        $this->memoShow();
        $this->memoLike();
        $this->memoUnlike();
        $this->memoEdit();
        $this->memoUpdate();
        $this->memoDestroy();
    }


    /**
     * 一覧画面
     * @return void
     */
    private function memoIndex(): void
    {
        $memoIndexResponse = $this->get(route("memos.index", [City::CITY_ID_NAME => $this->cityId]));
        $memoIndexResponse->assertStatus(Response::HTTP_OK);
    }
    /**
     * メモの新規作成画面
     * @return void
     */
    private function memoCreate(): void
    {
        $memoCreateResponse = $this->get(route("memos.create", [City::CITY_ID_NAME => $this->cityId]));
        $memoCreateResponse->assertStatus(Response::HTTP_OK);
    }
    /**
     * メモの保存処理
     * @return void
     */
    private function memoStore(): void
    {
        // 保存用のデータ
        $memoStoreData = $this->getMemoData();

        // 保存処理のテスト
        $memoStoreResponse = $this->post(route("memos.store", [City::CITY_ID_NAME => $this->cityId]), $memoStoreData);
        $memoStoreResponse->assertStatus(Response::HTTP_FOUND);
        $memoStoreResponse->assertRedirect(route("memos.index", [City::CITY_ID_NAME => $this->cityId]));

        // 整合性チェック
        // TODO: storeで保存したデータを厳密には取得できてない可能性がある
        $this->memoStored = Memo::orderBy("created_at", "desc")->first();

        // TODO: 基底クラスに整合性チェック用のfor文を書いて、チェックしたい
        $this->assertEquals($this->memoStored->memo, $memoStoreData[Memo::MEMO_MEMO]);
        $this->assertEquals($this->memoStored->img, $memoStoreData[Memo::MEMO_IMG]);
    }
    /**
     * メモの詳細画面
     * @return void
     */
    private function memoShow(): void
    {
        $memoShowResponse = $this->get(route("memos.show", [City::CITY_ID_NAME => $this->cityId, Memo::MEMO_ID_NAME => $this->memoStored->id]));
        $memoShowResponse->assertStatus(Response::HTTP_OK);
    }
    /**
     * メモのいいね
     * @return void
     */
    private function memoLike(): void
    {
        $memoLikeResponse = $this->post(route('memos.like', [Memo::MEMO_ID_NAME => $this->memoStored->id]));
        $memoLikeResponse->assertStatus(Response::HTTP_FOUND);
        $memoLikeResponse->assertRedirect(route("memos.show", [City::CITY_ID_NAME => $this->cityId, Memo::MEMO_ID_NAME => $this->memoStored->id]));

        // 整合性チェック
        $this->memoLiked = MemoLike::where(Memo::MEMO_DB_ID, $this->memoStored->id)->where(Memo::MEMO_DB_USER_ID, $this->user->id)->first();
        $this->assertNotNull($this->memoLiked);
    }
    /**
     * メモのいいね取り消し
     * @return void
     */
    private function memoUnlike(): void
    {
        $memoUnlikeResponse = $this->post(route('memos.like', [Memo::MEMO_ID_NAME => $this->memoStored->id]));
        $memoUnlikeResponse->assertStatus(Response::HTTP_FOUND);
        $memoUnlikeResponse->assertRedirect(route("memos.show", [City::CITY_ID_NAME => $this->cityId, Memo::MEMO_ID_NAME => $this->memoStored->id]));

        // 整合性チェック
        $memoUnliked = MemoLike::find($this->memoLiked->id);
        $this->assertNull($memoUnliked);
    }
    /**
     * メモの編集画面
     * @return void
     */
    private function memoEdit(): void
    {
        $memoEditResponse = $this->get(route("memos.edit", [City::CITY_ID_NAME => $this->cityId, Memo::MEMO_ID_NAME => $this->memoStored->id]));
        $memoEditResponse->assertStatus(Response::HTTP_OK);
    }
    /**
     * メモの更新処理
     * @return void
     */
    private function memoUpdate(): void
    {
        // 更新用のデータ
        $memoUpdateData = $this->getMemoData();

        $memoUpdateResponse = $this->patch(route("memos.update", [City::CITY_ID_NAME => $this->cityId, Memo::MEMO_ID_NAME => $this->memoStored->id]), $memoUpdateData);
        $memoUpdateResponse->assertStatus(Response::HTTP_FOUND);
        $memoUpdateResponse->assertRedirect(route("memos.show", [City::CITY_ID_NAME => $this->cityId, Memo::MEMO_ID_NAME => $this->memoStored->id]));

        // TODO: 整合性チェックを基底クラスの方にfor文を書いて行いたい
        $this->memoUpdated = Memo::find($this->memoStored->id);
        $this->assertEquals($this->memoUpdated->memo, $memoUpdateData[Memo::MEMO_MEMO]);
        $this->assertEquals($this->memoUpdated->img, $memoUpdateData[Memo::MEMO_IMG]);
    }
    /**
     * メモの削除処理
     * @return void
     */

    private function memoDestroy(): void
    {
        $memoDestroyResponse = $this->delete(route("memos.destroy", [City::CITY_ID_NAME => $this->cityId, Memo::MEMO_ID_NAME => $this->memoStored->id]));
        $memoDestroyResponse->assertStatus(Response::HTTP_FOUND);
        $memoDestroyResponse->assertRedirect(route("memos.index", [City::CITY_ID_NAME => $this->cityId]));

        // 整合性チェック
        $this->memoDestroyed = Memo::find($this->memoStored->id);
        $this->assertNull($this->memoDestroyed);
    }

    /**
     * post用のデータ
     * @return array
     */
    public function getMemoData(): array
    {
        $memoData = Memo::factory()->raw();

        return $memoData;
    }

}
