<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessorRequest;
use App\Http\Resources\ProfessorResource;
use App\Models\Professor;

class ProfessorController extends Controller
{
    public function index()
    {
        return ProfessorRequest::collection(Professor::paginate());
    }

    public function store(AlunoRequest $request)
    {
        $data = $request->all() + [
            'perfil' => 1,
            'password' => encrypt('temp-pass-aluno'),
        ];

        $model = Professor::create($data);

        return new ProfessorRequest($model);
    }

    public function show(string $id)
    {
        if (!$model = Professor::find($id)) {
            return response(['message' => 'Nada encontrado'], 404);
        }

        return new ProfessorRequest($model);
    }

    public function update(AlunoRequest $request, string $id)
    {
        if (!$model = Professor::find($id)) {
            return response(['message' => 'Nada encontrado'], 404);
        }

        if (!$model->update($request->all())) {
            return response(['message' => 'Falha ao atualizar'], 400);
        }

        return new ProfessorRequest($model);
    }

    public function destroy(string $id)
    {
        if (!$model = Professor::find($id)) {
            return response(['message' => 'Nada encontrado'], 404);
        }
        $model->delete();

        return response(['message' => 'Deletado com sucesso'], 204);
    }
}
