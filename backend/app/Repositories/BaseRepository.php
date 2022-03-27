<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Repositories\IBaseRepository;
use Illuminate\Foundation\Http\FormRequest;

/**
 * crudを行う基底のinterface
 */
abstract class BaseRepository implements IBaseRepository
{
    /**
     * @param int
     */
    abstract public function getAuthUserId(int $authUserId);

    /**
     * 保存処理
     * @param \Illuminate\Foundation\Http\FormRequest $request
     */
    abstract public function store(FormRequest $request);

    /**
     * 更新処理
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @param \Illuminate\Database\Eloquent\Model
     */
    abstract public function update(FormRequest $request, Model $model);

    /**
     * 削除処理
     * @param \Illuminate\Database\Eloquent\Model
     */
    abstract public function destroy(Model $model);

}