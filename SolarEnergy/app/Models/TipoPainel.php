<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPainel extends Model
{
    use HasFactory;

    protected $table = 'tipo_painel';
    protected $guarded =[];

    public function tipo_painel(){
        return $this->hasMany('App\Models\Pedido');
    }
}
