<?php
namespace App\Models;

use App\Models\Scopes\AlunoScope;

class Aluno extends \App\Models\User
{
    protected $table = 'users';

    protected static function booted(): void
    {
        static::addGlobalScope(new AlunoScope);
    }
}
