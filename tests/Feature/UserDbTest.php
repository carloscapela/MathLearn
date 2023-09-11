<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserDbTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_user_admin(): void
    {

        $user = User::factory()->create([
            'nome' => 'Pedagogo',
            'email' => 'admin@admin.com',
            'nickname' => 'pedagogo',
            'perfil' => 3,
        ]);

        $this->assertDatabaseHas('users', [
            'nome' => 'Pedagogo',
            'email' => 'admin@admin.com',
            'nickname' => 'pedagogo',
            'perfil' => 3,
        ]);

        $this->assertModelExists($user);
    }

    public function test_delete_user(): void
    {

        $user = User::factory()->create();

        $user->delete();

        $this->assertModelMissing($user);
    }

    // public function test_mult_users(): void
    // {
    //     User::factory()->count(5)->make();
    //     $this->expectsDatabaseQueryCount(5);
    // }
}
