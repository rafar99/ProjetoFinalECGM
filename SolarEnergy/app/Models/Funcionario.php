<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    protected $table = 'funcionario';
    protected $fillable = [
        'nome',
        'contacto',
        'tipoFuncionario_id',
        'users_id'
    ];

    protected $guarded =[];

    protected $dates = ['dataRegisto'];

    public function tipoFuncionario(){
        return $this->belongTo('App\Models\TipoFuncionario');
    }
}
