<?php

namespace App\Http\Controllers;

use App\Http\Resources\MedicoPacienteResource;
use App\Models\MedicoPaciente;
use Illuminate\Http\Request;

class MedicoPacienteController extends Controller
{
    /**
     * Vincular pacientes a médicos.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function relatePatient(Request $request)
    {
        $validator = new MedicoPaciente(); // Validador de dados
        if ($validator->validate($request->all())){
            $medico_paciente = MedicoPaciente::create($request->all());
            return new MedicoPacienteResource($medico_paciente);
        }

        return response($validator->errors, 400); // Retorna os erros e status http 400
    }
}
