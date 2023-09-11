<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProfessorResource;
use App\Models\Professor;

class ProfessorController extends Controller
{
    public function index()
    {
        return ProfessorResource::collection(Professor::paginate());
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
