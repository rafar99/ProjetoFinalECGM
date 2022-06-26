<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUtilizador extends Model
{
    use HasFactory;

    protected $table = "tipo_utilizador";
    protected $guarded =[];
    
    public function tipoUtilizador(){
        return $this->belongTo(Utilizador::class, 'tipoUtilizador');
    }

}


