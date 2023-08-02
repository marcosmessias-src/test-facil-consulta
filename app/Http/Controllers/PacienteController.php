<?php

namespace App\Http\Controllers;

use App\Http\Resources\PacienteResource;
use App\Models\Medico;

class PacienteController extends Controller
{
    /**
     * Listar pacientes por médico.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function byDoctor($id_medico)
    {
        $medico = Medico::find($id_medico);
        if($medico){
            return PacienteResource::collection($medico->pacientes);
        }

        return response([
            'Médico não encontrado!'
        ], 404);
    }
}
