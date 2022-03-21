<?php

namespace Tests\Feature\Memo;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\Feature\BaseFeatureTestCase;
use Tests\TestCase;

class MemoLikeTest extends BaseFeatureTestCase
{
    /**
     * メモのいいねのシナリオテスト
     * @return void
     */
    public function testMemoLike(): void
    {
        $this->memoLike();
        $this->memoUnlike();
    }

    /**
     * メモのいいね
     * @return void
     */
    private function memoLike(): void
    {
        $memoLikeResponse = $this->post(route('memos.like'));
        $memoLikeResponse->assertStatus(Response::HTTP_FOUND);
    }

    /**
     * メモのいいね取り消し
     * @return void
     */
    private function memoUnlike(): void
    {
        $memoUnlikeResponse = $this->post(route('memos.unlike'));
        $memoUnlikeResponse->assertStatus(Response::HTTP_FOUND);
        $memoUnlikeResponse->assertRedirect(route('memos'));
    }
}
