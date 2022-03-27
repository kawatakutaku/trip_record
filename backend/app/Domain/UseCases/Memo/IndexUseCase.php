<?php

namespace App\Domain\UseCases\Memo;

use App\Domain\UseCases\BaseUseCase;
use App\Models\User;
use App\Repositories\Memo\IMemoResponseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class IndexUseCase extends BaseMemoUseCase
{
    /**
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getIndexMemos(string $cityId=null): Collection
    {
        // メモ返信の一覧の取得
        $memos = $this->getMemos($cityId);

        return $memos;
    }
}

