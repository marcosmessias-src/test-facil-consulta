<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\MedicoPacienteController;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| JWT Routes
|--------------------------------------------------------------------------
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

Route::get('cidades', [CidadeController::class, 'index']); // Lista todas as cidades

/*
|--------------------------------------------------------------------------
| Listar médicos
|--------------------------------------------------------------------------
|
*/

Route::get('medicos', [MedicoController::class, 'index']); // Lista todos os médicos

Route::get('cidades/{id_cidade}/medicos', [MedicoController::class, 'bycity']); // Lista médicos por cidade

/*
|--------------------------------------------------------------------------
| Cadastrar médico
|--------------------------------------------------------------------------
|
*/

Route::middleware('auth:api')->post('medicos', [MedicoController::class, 'store']); // Adiciona médicos ao banco de dados

/*
|--------------------------------------------------------------------------
| Relacionar paciente com médico
|--------------------------------------------------------------------------
|
*/

Route::middleware('auth:api')->post('/medicos/{id_medico}/pacientes', [MedicoPacienteController::class, 'relatePatient']); // Vincula pacientes a médicos

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
