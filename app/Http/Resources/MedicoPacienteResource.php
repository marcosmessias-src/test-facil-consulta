<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicoPacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "medico" =>
                [
                    "id"=> $this->medico->id,
                    "nome"=> $this->medico->nome,
                    "especialidade"=> $this->medico->especialidade,
                    "cidade_id"=> $this->medico->cidade_id,
                    "created_at"=> $this->medico->created_at?->format('Y-m-d H:i:s'),
                    "updated_at"=> $this->medico->updated_at?->format('Y-m-d H:i:s'),
                    "deleted_at"=> $this->medico->deleted_at?->format('Y-m-d H:i:s')
                ],

            "paciente" =>
                [
                    "id" => $this->paciente->id,
                    "nome"=> $this->paciente->nome,
                    "cpf"=> $this->paciente->cpf,
                    "celular"=> $this->paciente->celular,
                    "created_at"=> $this->paciente->created_at?->format('Y-m-d H:i:s'),
                    "updated_at"=> $this->paciente->updated_at?->format('Y-m-d H:i:s'),
                    "deleted_at"=> $this->paciente->deleted_at?->format('Y-m-d H:i:s')
                ]
        ];
    }
}
