<?php

namespace App\Repositories\Memo;

use App\Repositories\IBaseRepository;

interface IMemoResponseRepository extends IBaseRepository
{
    /**
     * @param string
     */
    public function getAuthUserId(string $authUserId);

}