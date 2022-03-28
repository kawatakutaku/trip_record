<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * crudを行う基底のinterface
 */
interface IBaseRepository
{
    /**
     * @return int
     */
    public function getAuthUserId(): int;

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(Request $request): Collection;

    /**
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function store(FormRequest $request): Collection;

    /**
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function update(FormRequest $request, Model $model);

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function destroy(Model $model): Collection;

}