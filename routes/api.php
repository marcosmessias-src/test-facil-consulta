<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\MedicoPacienteController;
use App\Http\Controllers\PacienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::get('user', 'user');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

/*
|--------------------------------------------------------------------------
| Listar cidades
|--------------------------------------------------------------------------
|
*/

Route::get('cidades', [CidadeController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Listar médicos
|--------------------------------------------------------------------------
|
*/

Route::get('medicos', [MedicoController::class, 'index']);

Route::get('cidades/{id_cidade}/medicos', [MedicoController::class, 'bycity']);

/*
|--------------------------------------------------------------------------
| Cadastrar médico
|--------------------------------------------------------------------------
|
*/

Route::middleware('auth:api')->post('medicos', [MedicoController::class, 'store']);

/*
|--------------------------------------------------------------------------
| Relacionar paciente com médico
|--------------------------------------------------------------------------
|
*/

Route::middleware('auth:api')->post('/medicos/{id_medico}/pacientes', [MedicoPacienteController::class, 'relatePatient']);

/*
|--------------------------------------------------------------------------
| Listar/Atualizar/Cadastrar pacientes
|--------------------------------------------------------------------------
|
*/

Route::middleware('auth:api')->controller(PacienteController::class)->group(function () {
    Route::get('medicos/{id_medico}/pacientes', 'byDoctor'); // Lista pacientes por médico
    Route::post('pacientes/{id_paciente}', 'update'); // Atualiza dados do paciente
    Route::post('pacientes', 'store'); // Adiciona pacientes
});
