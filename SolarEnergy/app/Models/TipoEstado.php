<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEstado extends Model
{
    use HasFactory;
    protected $table = 'tipo_estado';
    protected $guarded =[];

    public function formulario_contactos(){
        return $this->hasMany('App\Models\FormularioContactos');
    }
}
