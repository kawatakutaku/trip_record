<?php

namespace App\Domain\UseCases\MemoResponse;

use App\Domain\UseCases\BaseUseCase;
use App\Models\MemoResponse;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseMemoResponseUseCase extends BaseUseCase
{
    /**
     * メモの一覧のために取得するメソッド
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getMemoResponses(int $memoId=null): Collection
    {
        $authUserId = $this->getAuthUserId();

        if ($memoId) {
            $memoResponses = MemoResponse::where(MemoResponse::MEMO_RESPONSE_USER_ID, $authUserId)->get();
        } else {
            $memoResponses = MemoResponse::where(MemoResponse::MEMO_RESPONSE_USER_ID, $authUserId)->where(MemoResponse::MEMO_RESPONSE_MEMO_ID, $memoId)->get();
        }

        return $memoResponses;
    }

}