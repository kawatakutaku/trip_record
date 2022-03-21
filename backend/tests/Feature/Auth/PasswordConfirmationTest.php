<?php

namespace Tests\Feature\Auth;

use App\Models\MasterGender;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\Feature\BaseFeatureTestCase;
use Tests\TestCase;

class PasswordConfirmationTest extends BaseFeatureTestCase
{
    protected $needLogin = false;

    public function testConfirmPassword()
    {
        $user = User::factory()->create([
            User::ACCOUNT_GENDER => MasterGender::inRandomOrder()->first()->gender,
        ]);

        $response = $this->actingAs($user)->get('/confirm-password');
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testConfirmedPassword()
    {
        $user = User::factory()->create([
            User::ACCOUNT_GENDER => MasterGender::inRandomOrder()->first()->gender,
        ]);

        $response = $this->actingAs($user)->post('/confirm-password', [
            User::ACCOUNT_PASSWORD => User::ACCOUNT_DEFAULT_PASSWORD_VALUE,
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function testNotConfirmedPassword()
    {
        $user = User::factory()->create([
            User::ACCOUNT_GENDER => MasterGender::inRandomOrder()->first()->gender,
        ]);

        $response = $this->actingAs($user)->post('/confirm-password', [
            User::ACCOUNT_PASSWORD => User::ACCOUNT_WRONG_PASSWORD_VALUE,
        ]);

        $response->assertSessionHasErrors();
    }
}
