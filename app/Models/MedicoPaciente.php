<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class MedicoPaciente extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'medico_id',
        'paciente_id',
    ];

    /**
     * SoftDelete addition.
     */
    protected $dates = ['deleted_at'];

    /**
     * Rules for validation.
     */
    protected $rules = array(
        'medico_id' => 'required|numeric',
        'paciente_id' => 'required|numeric'
    );

    /**
     * Input validation.
     */
    public function validate($inputs){
        $validator = Validator::make($inputs, $this->rules);
        if ($validator->passes()) return true;
        $this->errors = $validator->messages();
        return false;
    }

    /**
     * Return doctor.
     */
    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    /**
     * Return patient.
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
