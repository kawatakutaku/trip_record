<?php

namespace Tests\Feature;

use App\Models\MasterGender;
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

    protected $needLogin = true;

    // use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::inRandomOrder()->first();

        if ($this->needLogin) {
            $this->loginForm();
            $this->login();
        }

        $this->genderId = MasterGender::inRandomOrder()->first()->id;
    }

    /**
     * ログイン画面
     * @return void
     */
    public function loginForm(): void
    {
        $loginFormResponse = $this->get(route("login"));
        $loginFormResponse->assertStatus(Response::HTTP_OK);
    }

    /**
     * ログイン処理
     * @return void
     */
    public function login(): void
    {
        $loginResponse = $this->post(route("login.post"), [User::ACCOUNT_EMAIL => $this->user->email, User::ACCOUNT_PASSWORD => User::ACCOUNT_DEFAULT_PASSWORD_VALUE]);
        $this->assertAuthenticated();
        $loginResponse->assertStatus(Response::HTTP_FOUND);
        $loginResponse->assertRedirect(RouteServiceProvider::CITY);
    }

    /**
     * ログアウト処理
     * @return void
     */
    public function logout(): void
    {
        $logoutResponse = $this->post(route("logout"));
        $logoutResponse->assertStatus(Response::HTTP_FOUND);
        $logoutResponse->assertRedirect(route("login"));
    }

    protected function tearDown(): void
    {
        if ($this->needLogin) {
            $this->logout();
        }

        parent::tearDown();
    }
}
