<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * 他のseederの基底クラス
 */
class BaseDatabaseSeeder extends Seeder
{
    protected $needUsers = false;

    /**
     * usersテーブルから2人分のレコードをランダムに取得する
     */
    protected function getUsersRecord()
    {
        if ($this->needUsers)
        {
            $users = User::inRandomOrder()->take(2)->get();
            return array($users[0]->id, $users[1]->id);
        }
    }
}
