<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

/**
 * featureテストの基底クラス
 */
class BaseFeatureTestCase extends TestCase
{

    // use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::inRandomOrder()->first();
    }

    /**
     * ログイン画面
     * @test
     * @group login
     * @return void
     */
    public function testLoginForm(): void
    {
        $loginFormResponse = $this->get(route("login"));
        $loginFormResponse->assertStatus(Response::HTTP_OK);
    }

    /**
     * ログイン処理
     * @test
     * @group login
     * @return void
     */
    public function testLogin(): void
    {
        $loginResponse = $this->post(route("login.post"), [User::ACCOUNT_EMAIL => $this->user->email, User::ACCOUNT_PASSWORD => User::ACCOUNT_PASSWORD_VALUE]);
        $this->assertAuthenticated();
        $loginResponse->assertStatus(Response::HTTP_FOUND);
        $loginResponse->assertRedirect(RouteServiceProvider::HOME);
    }
}
