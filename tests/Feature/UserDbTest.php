<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserDbTest extends TestCase
{
    use RefreshDatabase;

    private function getUser(): User
    {
        return User::factory()->create([
            'nome' => 'Pedagogo',
            'email' => 'admin@admin.com',
            'nickname' => 'pedagogo',
            'perfil' => 3,
        ]);
    }

    public function test_create_user_admin(): void
    {
        $user = $this->getUser();

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
        $user = $this->getUser();

        $user->delete();

        $this->assertModelMissing($user);
    }
}
