<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormularioContactos extends Model
{
    use HasFactory;
    protected $table = 'formulario_contactos';
    protected $guarded =[];

    public function tipo_estado(){
        return $this->belongTo('App\Models\TipoEstado');
    }
}
