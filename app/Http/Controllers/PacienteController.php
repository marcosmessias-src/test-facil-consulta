<?php

namespace App\Http\Controllers;

use App\Http\Resources\PacienteResource;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Listar pacientes por médico.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function byDoctor($id_medico)
    {
        $medico = Medico::find($id_medico); // Busca o médico e verifica se o mesmo existe
        if($medico){
            return PacienteResource::collection($medico->pacientes);
        }

        return response([
            'Médico não encontrado!'
        ], 404); // Retorna erro e status http 404
    }

    /**
     * Atualizar dados do paciente.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id_paciente, Request $request)
    {
        $paciente = Paciente::find($id_paciente); // Busca o paciente e verifica se o mesmo existe

        if($paciente){

            $validator = new Paciente(); // Validador de dados

            if ($validator->validate($request->all(), true)){
                $paciente->update($request->all());
                return new PacienteResource($paciente);
            }

            return response($validator->errors, 400); // Retorna os erros e status http 400
        }

        return response([
            'Paciente não encontrado!'
        ], 404); // Retorna erro e status http 404
    }
}
