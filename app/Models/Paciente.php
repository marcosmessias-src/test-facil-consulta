<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'cpf' => 'required|size:20'
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
}
