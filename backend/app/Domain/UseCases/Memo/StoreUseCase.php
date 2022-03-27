<?php

namespace App\Domain\UseCases\Memo;

use App\Domain\UseCases\BaseUseCase;
use App\Models\User;
use App\Repositories\Memo\IMemoRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class StoreUseCase extends BaseMemoUseCase
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
    public function execute(FormRequest $request): Collection
    {
        // 保存処理
        $this->getBaseRepository()->getAuthUserId($this->getAuthUserId());
        $this->getBaseRepository()->store($request);

        // メモ返信の一覧の取得
        $memos = $this->getMemos($request->cityId);

        return $memos;
    }
}

