<?php

namespace Tests\Feature\Auth;

use App\Models\MasterGender;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\Response;
use Tests\Feature\BaseFeatureTestCase;
use Tests\TestCase;

class PasswordResetTest extends BaseFeatureTestCase
{
    protected $needLogin = false;

    public function testResetPassword()
    {
        $response = $this->get('/forgot-password');
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testResetPasswordRequested()
    {
        Notification::fake();

        $user = User::factory()->create([
            User::ACCOUNT_GENDER => $this->genderId
        ]);

        $this->post('/forgot-password', [User::ACCOUNT_EMAIL => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class);
    }

    // TODO: メソッド名を変更する必要がある
    public function testResetPasswordNotification()
    {
        Notification::fake();

        $user = User::factory()->create([
            User::ACCOUNT_GENDER => $this->genderId
        ]);

        $this->post('/forgot-password', [User::ACCOUNT_EMAIL => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class, function ($notification) {
            $response = $this->get('/reset-password/'.$notification->token);
            $response->assertStatus(Response::HTTP_OK);

            return true;
        });
    }

    public function testPasswordToken()
    {
        Notification::fake();

        $user = User::factory()->create([
            User::ACCOUNT_GENDER => $this->genderId
        ]);

        $this->post('/forgot-password', [User::ACCOUNT_EMAIL => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class, function ($notification) use ($user) {
            $response = $this->post('/reset-password', [
                'token' => $notification->token,
                User::ACCOUNT_EMAIL => $user->email,
                User::ACCOUNT_PASSWORD => User::ACCOUNT_DEFAULT_PASSWORD_VALUE,
                User::ACCOUNT_PASSWORD_CONFIRMATION => User::ACCOUNT_DEFAULT_PASSWORD_VALUE,
            ]);

            $response->assertSessionHasNoErrors();

            return true;
        });
    }
}
