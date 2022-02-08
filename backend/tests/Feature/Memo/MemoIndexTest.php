<?php

namespace Tests\Feature\Memo;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class MemoIndexTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMemoIndex()
    {
        $memoIndexResponse = $this->get(route("memos.index"));
        $memoIndexResponse->assertStatus(Response::HTTP_OK);
    }

}
