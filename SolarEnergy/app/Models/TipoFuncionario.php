<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoFuncionario extends Model
{
    use HasFactory;
    protected $table = 'tipo_funcionario';
    protected $guarded =[];

    public function funcionario(){
        return $this->hasMany('App\Models\Funcionario');
    }
}
