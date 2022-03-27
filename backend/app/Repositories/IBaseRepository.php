<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * crudを行う基底のinterface
 */
interface IBaseRepository
{
    /**
     * @param int
     */
    public function getAuthUserId(int $authUserId);

    /**
     * @param \Illuminate\Foundation\Http\FormRequest $request
     */
    public function store(FormRequest $request);

    /**
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function update(FormRequest $request, Model $model);

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function destroy(Model $model);

}