<?php

namespace App\Domain\UseCases\Memo;

use App\Domain\UseCases\BaseUseCase;
use App\Models\MemoResponse;
use App\Models\User;
use App\Repositories\Memo\IMemoRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class DestroyUseCase extends BaseMemoUseCase
{
    public function __construct(
        IMemoRepository $repository
    ) {
        $this->setBaseRepository($repository);
    }

    /**
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function execute(Model $model): Collection
    {
        // メモ返信の削除処理
        $this->getBaseRepository()->destroy($model);

        // メモ返信の一覧の取得
        $memos = $this->getMemos($model->city_id);

        return $memos;
    }
}

