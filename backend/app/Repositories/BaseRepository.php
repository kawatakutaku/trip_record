<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Repositories\IBaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

/**
 * crudを行う基底のinterface
 */
abstract class BaseRepository implements IBaseRepository
{
    /**
     * @return int
     */
    public function getAuthUserId(): int
    {
        $user = app(User::class);
        $authUserId = $user->getAuthAccountId();
        return $authUserId;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    abstract public function index(Request $request): Collection;

    /**
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    abstract public function store(FormRequest $request): Collection;

    /**
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    abstract public function update(FormRequest $request, Model $model);

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return \Illuminate\Database\Eloquent\Collection
     */
    abstract public function destroy(Model $model): Collection;

}