<?php

namespace Tests\Feature\Memo;

use App\Models\Memo;
use App\Models\MemoResponse;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\Feature\BaseFeatureTestCase;
use Tests\TestCase;

class MemoResponseTest extends BaseFeatureTestCase
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        // ログイン中のユーザー情報を取得
        $user = app(User::class);
        $this->userId = $user->getAuthAccountId();

        $this->memoId = Memo::inRandomOrder()->first()->id;
    }


    /**
     * メモ返信のシナリオテスト
     * @test
     * @group memoResponse
     * @return void
     */
    public function testMemoResponse(): void
    {
        $this->memoResponseIndex();
        $this->memoResponseCreate();
        $this->memoResponseStore();
        $this->memoResponseShow();
        $this->memoResponseEdit();
        $this->memoResponseUpdate();
        $this->memoResponseDestroy();
    }


    /**
     * 一覧画面
     * @return void
     */
    private function memoResponseIndex(): void
    {
        $memoResponseIndexResponse = $this->get(route("responses.index"));
        $memoResponseIndexResponse->assertStatus(Response::HTTP_OK);
    }
    /**
     * メモの新規作成画面
     * @return void
     */
    private function memoResponseCreate(): void
    {
        $memoResponseCreateResponse = $this->get(route("responses.create", [MemoResponse::MEMO_ID => $this->memoId]));
        $memoResponseCreateResponse->assertStatus(Response::HTTP_OK);
    }
    /**
     * メモの保存処理
     * @return void
     */
    private function memoResponseStore(): void
    {
        // 保存用のデータ
        $memoResponseStoreData = $this->getMemoResponseData();

        // 保存処理のテスト
        $memoResponseStoreResponse = $this->post(route("responses.store", [MemoResponse::MEMO_ID => $this->memoId]), $memoResponseStoreData);
        $memoResponseStoreResponse->assertStatus(Response::HTTP_FOUND);
        $memoResponseStoreResponse->assertRedirect(route("responses.index"));

        // 整合性チェック
        // TODO: storeで保存したデータを厳密には取得できてない可能性がある
        $this->memoResponseStored = MemoResponse::where(MemoResponse::MEMO_RESPONSE_MEMO_ID, $this->memoId)->where(MemoResponse::MEMO_RESPONSE_USER_ID, $this->userId)->orderBy("created_at", "desc")->first();

        // TODO: 基底クラスに整合性チェック用のfor文を書いて、チェックしたい
        $this->assertEquals($this->memoResponseStored->message, $memoResponseStoreData[MemoResponse::MEMO_RESPONSE_MESSAGE]);
    }
    /**
     * メモの詳細画面
     * @return void
     */
    private function memoResponseShow(): void
    {
        $memoResponseShowResponse = $this->get(route("responses.show", [MemoResponse::MEMO_RESPONSE_ID => $this->memoResponseStored->id]));
        $memoResponseShowResponse->assertStatus(Response::HTTP_OK);
    }
    /**
     * メモの編集画面
     * @return void
     */
    private function memoResponseEdit(): void
    {
        $memoResponseEditResponse = $this->get(route("responses.edit", [MemoResponse::MEMO_RESPONSE_ID => $this->memoResponseStored->id]));
        $memoResponseEditResponse->assertStatus(Response::HTTP_OK);
    }
    /**
     * メモの更新処理
     * @return void
     */
    private function memoResponseUpdate(): void
    {
        // 更新用のデータ
        $memoResponseUpdateData = $this->getMemoResponseData();

        $memoResponseUpdateResponse = $this->patch(route("responses.update", [MemoResponse::MEMO_RESPONSE_ID => $this->memoResponseStored->id]), $memoResponseUpdateData);
        $memoResponseUpdateResponse->assertStatus(Response::HTTP_FOUND);
        $memoResponseUpdateResponse->assertRedirect(route("responses.show", [MemoResponse::MEMO_RESPONSE_ID => $this->memoResponseStored->id]));

        // TODO: 整合性チェックを基底クラスの方にfor文を書いて行いたい
        $this->memoResponseUpdated = MemoResponse::find($this->memoResponseStored->id);
        $this->assertEquals($this->memoResponseUpdated->message, $memoResponseUpdateData[MemoResponse::MEMO_RESPONSE_MESSAGE]);
    }
    /**
     * メモの削除処理
     * @return void
     */

    private function memoResponseDestroy(): void
    {
        $memoResponseDestroyResponse = $this->delete(route("responses.destroy", [MemoResponse::MEMO_RESPONSE_ID => $this->memoResponseStored->id]));
        $memoResponseDestroyResponse->assertStatus(Response::HTTP_FOUND);
        $memoResponseDestroyResponse->assertRedirect(route("responses.index"));

        // 整合性チェック
        $this->memoResponseDestroyed = MemoResponse::find($this->memoResponseStored->id);
        $this->assertNull($this->memoResponseDestroyed);
    }

    /**
     * post用のデータ
     * @return array
     */
    public function getMemoResponseData(): array
    {
        $memoResponseData = MemoResponse::factory()->raw();

        return $memoResponseData;
    }
}
