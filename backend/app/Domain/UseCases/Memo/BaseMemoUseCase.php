<?php

namespace App\Domain\UseCases\Memo;

use App\Domain\UseCases\BaseUseCase;
use App\Models\City;
use App\Models\Memo;
use App\Models\MemoResponse;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseMemoUseCase extends BaseUseCase
{
    /**
     * メモの一覧を取得するメソッド
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getMemos(int $cityId=null): Collection
    {
        $authUserId = $this->getAuthUserId();

        if ($cityId) {
            $memos = Memo::where(Memo::MEMO_DB_USER_ID, $authUserId)->get();
        } else {
            $memos = Memo::where(Memo::MEMO_DB_USER_ID, $authUserId)->where(City::CITY_DB_ID, $cityId)->get();
        }

        return $memos;
    }

}