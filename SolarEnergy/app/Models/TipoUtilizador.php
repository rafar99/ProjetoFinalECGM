<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUtilizador extends Model
{
    use HasFactory;
    protected $table = "tipo_utilizador"; //tabela tipo_painel da base de dados
    protected $guarded =[];

    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
