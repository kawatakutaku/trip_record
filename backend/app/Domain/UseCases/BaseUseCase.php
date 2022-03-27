<?php

namespace App\Domain\UseCases;

use App\Models\User;
use App\Repositories\IBaseRepository;


/**
 * @property IBaseRepository $baseRepository
 */
abstract class BaseUseCase
{
    private IBaseRepository $baseRepository;

    /**
     * @return App\Repositories\IBaseRepository
     */
    protected function getBaseRepository(): IBaseRepository
    {
        return $this->baseRepository;
    }

    /**
     * @param App\Repositories\IBaseRepository $baseRepository
     */
    protected function setBaseRepository(IBaseRepository $baseRepository)
    {
        $this->baseRepository = $baseRepository;
    }

    /**
     * ユーザーのidを取得するメソッド
     * @return string
     */
    protected function getAuthUserId(): string
    {
        // TODO: 基底クラスを作って、そこでuserIdを取得するようにする
        $user = app(User::class);
        $authUserId = $user->getAuthAccountId();

        return $authUserId;
    }

}