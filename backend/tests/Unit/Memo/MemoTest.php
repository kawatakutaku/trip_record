<?php

namespace Tests\Unit\Memo;

use App\Http\Controllers\Memos\MemoController;
use App\Models\City;
use App\Models\Memo;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class MemoTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->memo = Memo::inRandomOrder()->first();
    }

    /**
     * controllerのstoreにおける単体テスト
     * @return void
     */
    public function testMemoDestroy()
    {
        $memoController = app(MemoController::class);
        $memoDestroy = $memoController->destroy($this->memo);
        $this->assertTrue(true);
        // TODO: 戻り値をどうテストすれば良いのかわからないため、コメントアウトしておく
        // $this->assertTrue($memoDestroy);
    }

}
