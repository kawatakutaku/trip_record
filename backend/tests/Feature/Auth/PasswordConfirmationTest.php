<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\Feature\BaseFeatureTestCase;
use Tests\TestCase;

class PasswordConfirmationTest extends BaseFeatureTestCase
{
    public function testConfirmPassword()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/confirm-password');
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testConfirmedPassword()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function testNotConfirmedPassword()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
    }
}
