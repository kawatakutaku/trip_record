<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Tests\Feature\BaseFeatureTestCase;
use Tests\TestCase;

class RegistrationTest extends BaseFeatureTestCase
{
    protected $needLogin = false;

    /**
     * 新規登録画面
     * @return void
     */
    public function testRegisterForm(): void
    {
        $response = $this->get(route('register'));
        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * 新規登録処理
     * @return void
     */
    public function testRegister(): void
    {
        $userData = $this->getUserData();

        // TODO: controllerとview側も変更してDBに合わせる必要がある
        $registerResponse = $this->post(route('register.post'), $userData);
        $registerResponse->assertStatus(Response::HTTP_FOUND);

        $this->assertAuthenticated();
        $registerResponse->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * 新規登録用のデータ
     * @return array
     */
    public function getUserData(): array
    {
        $userData = User::factory()->raw([
            User::ACCOUNT_PASSWORD => User::ACCOUNT_PASSWORD_VALUE,
            User::ACCOUNT_PASSWORD_CONFIRMATION => User::ACCOUNT_PASSWORD_VALUE,
        ]);

        return $userData;
    }
}
