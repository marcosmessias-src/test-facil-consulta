<?php

namespace App\Http\Controllers;

use App\Http\Resources\MedicoResource;
use App\Http\Resources\StoreMedicoResource;
use App\Models\Cidade;
use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * List all doctors.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return MedicoResource::collection(Medico::all()); // Retorna uma collection com todos os médicos cadastrados
    }

    /**
     * List doctors by city.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function byCity($id_cidade)
    {
        $cidade = Cidade::find($id_cidade);
        if($cidade){
            return MedicoResource::collection($cidade->medicos);
        }

        return response(['Cidade não encontrada!'], 404); // Retorna o erro e status http 404

    }

    /**
     * Store a newly created doctor in storage.
     */
    public function store(Request $request)
    {
        $medicoValidator = new Medico();
        if($medicoValidator->validate($request->all())){
            $medico = Medico::create($request->all());
            return new StoreMedicoResource($medico);
        }

        return response($medicoValidator->errors, 400); // Retorna os erros e status http 400
    }


}
