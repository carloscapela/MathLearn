<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_login(): void
    {
        User::factory()->create([
            'nome' => 'Pedagogo',
            'email' => 'admin@admin.com',
            'nickname' => 'pedagogo',
            'perfil' => 3,
        ]);

        $response = $this->postJson('/v1/login', [
            'email' => 'admin@admin.com',
            'password' => 'password',
        ]);
        $response->assertStatus(200);

        $this->assertArrayHasKey('access_token', $response);
        $this->assertArrayHasKey('token_type', $response);
        $this->assertArrayHasKey('expires_in', $response);
    }

    public function test_not_login(): void
    {
        User::factory()->create([
            'nome' => 'Pedagogo',
            'email' => 'admin@admin.com',
            'nickname' => 'pedagogo',
            'perfil' => 3,
        ]);

        $response = $this->postJson('/v1/login', [
            'email' => 'admin@1admin.com',
            'password' => 'password1',
        ]);
        $response->assertStatus(401);
    }
}
