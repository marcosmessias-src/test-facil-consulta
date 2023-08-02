<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Paciente extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'cpf',
        'celular',
    ];

    /**
     * SoftDelete addition.
     */
    protected $dates = ['deleted_at'];

    /**
     * Rules for validation.
     */
    protected $rules = array(
        'nome' => 'required|max:100',
        'cpf' => 'required|max:20',
        'celular' => 'required|max:20'
    );

    /**
     * Rules for validation when update.
     */
    protected $rulesUpdate = array(
        'nome' => 'max:100',
        'cpf' => 'max:20',
        'celular' => 'max:20'
    );

    /**
     * Input validation.
     */
    public function validate($inputs, $update = false){
        $rules = $this->rules;

        if($update) $rules = $this->rulesUpdate;

        $validator = Validator::make($inputs, $rules);
        if ($validator->passes()) return true;
        $this->errors = $validator->messages();
        return false;
    }

    /**
     * The Doctors that belong to the Pacients.
     */
    public function medicos(): BelongsToMany
    {
        return $this->belongsToMany(Medico::class, 'medico_pacientes');
    }
}
