<?php
namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class AlunoScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('perfil', 1);
    }
}
