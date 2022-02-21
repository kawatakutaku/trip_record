<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
        $response = $this->get('/register');
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
        $response = $this->post('/register', $userData);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * 新規登録用のデータ
     * @return array
     */
    public function getUserData(): array
    {
        $userData = User::factory()->raw();

        return $userData;
    }
}
