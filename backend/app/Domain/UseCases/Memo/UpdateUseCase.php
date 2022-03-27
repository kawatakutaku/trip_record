<?php

namespace App\Domain\UseCases\Memo;

use App\Models\User;
use App\Repositories\Memo\IMemoRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class UpdateUseCase extends BaseMemoUseCase
{
    public function __construct(
        IMemoRepository $repository
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

