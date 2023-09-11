<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Turma;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'nome' => 'Pedagogo',
            'email' => 'admin@admin.com',
            'nickname' => 'pedagogo',
            'perfil' => 3,
        ]);
        Turma::factory()->count(15)->create();
        User::factory()->count(30)->create();
    }
}
