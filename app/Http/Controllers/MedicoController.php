<?php

namespace App\Http\Controllers;

use App\Http\Resources\MedicoResource;
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
        return MedicoResource::collection(Medico::all());
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

        return response([
            'Cidade não encontrada!'
        ], 404);

    }
}
