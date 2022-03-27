<?php

namespace App\Domain\UseCases\MemoResponse;

use App\Domain\UseCases\BaseUseCase;
use App\Models\MemoResponse;
use App\Models\User;
use App\Repositories\Memo\IMemoResponseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class IndexUseCase extends BaseMemoResponseUseCase
{
    /**
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getIndexMemoResponses(string $memoId=null): Collection
    {
        // メモ返信の一覧の取得
        $memoResponses = $this->getMemoResponses($memoId);

        return $memoResponses;
    }
}

