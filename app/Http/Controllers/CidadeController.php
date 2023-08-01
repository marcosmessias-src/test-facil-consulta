<?php

namespace App\Http\Controllers;

use App\Http\Resources\CidadeResource;
use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * List all cities.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return CidadeResource::collection(Cidade::all());
    }
}
