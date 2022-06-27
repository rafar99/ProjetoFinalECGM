<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipoEstadoController extends Controller
{
    protected $table = 'tipo_estado';
    protected $guarded =[];

    public function tipEstado(){
        return $this->belongTo(Pedido::class, 'tipoEstado');
    }
}
