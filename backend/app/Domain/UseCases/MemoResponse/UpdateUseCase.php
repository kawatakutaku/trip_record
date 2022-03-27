<?php

namespace App\Domain\UseCases\MemoResponse;

use App\Models\MemoResponse;
use App\Models\User;
use App\Repositories\Memo\IMemoResponseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class UpdateUseCase extends BaseMemoResponseUseCase
{
    public function __construct(
        IMemoResponseRepository $repository
    ) {
        $this->setBaseRepository($repository);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param \Illuminate\Foundation\Http\FormRequest $request
     */
    public function execute(FormRequest $request, Model $model)
    {
        // memoResponseの更新処理
        $this->getBaseRepository()->update($request, $model);
    }
}

