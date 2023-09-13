<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurmaRequest;
use App\Http\Resources\TurmaResource;
use App\Models\Turma;

class TurmaController extends Controller
{
    public function index()
    {
        return TurmaResource::collection(Turma::paginate());
    }

    public function store(TurmaRequest $request)
    {
        $model = Turma::create($request->all());

        return new TurmaResource($model);
    }

    public function show(string $id)
    {
        if (!$model = Turma::find($id)) {
            return response(['message' => 'Nada encontrado'], 404);
        }

        return new TurmaResource($model);
    }

    public function update(TurmaRequest $request, string $id)
    {
        if (!$model = Turma::find($id)) {
            return response(['message' => 'Nada encontrado'], 404);
        }

        if (!$model->update($request->all())) {
            return response(['message' => 'Falha ao atualizar'], 400);
        }

        return new TurmaResource($model);
    }

    public function destroy(string $id)
    {
        if (!$model = Turma::find($id)) {
            return response(['message' => 'Nada encontrado'], 404);
        }
        $model->delete();

        return response(['message' => 'Deletado com sucesso'], 204);
    }
}
