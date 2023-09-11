<?php
namespace App\Models;

use App\Models\Scopes\ProfessorScope;

class Professor extends \App\Models\User
{
    protected $table = 'users';

    protected static function booted(): void
    {
        static::addGlobalScope(new ProfessorScope);
    }
}
