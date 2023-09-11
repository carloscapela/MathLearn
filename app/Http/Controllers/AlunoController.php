<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AlunoResource;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function index()
    {
        return AlunoResource::collection(Aluno::paginate());
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
