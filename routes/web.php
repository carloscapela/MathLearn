<?php
use Illuminate\Support\Facades\Route;

/**
 * @OA\Info(title="My First API", version="0.1")
 */
Route::get('/', function () {
    return [
        'name' => 'mathlearn',
        'description' => 'Mathlearn Version 01',
    ];
});
