<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Medico extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'especialidade',
        'cidade_id'
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
        'especialidade' => 'required|max:100',
        'cidade_id' => 'required'
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
     * Get the city that owns the doctor.
     */
    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    /**
     * The Pacients that belong to the Doctor.
     */
    public function pacientes(): BelongsToMany
    {
        return $this->belongsToMany(Paciente::class, 'medico_pacientes');
    }
}
