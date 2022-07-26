<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPedido extends Model
{
    use HasFactory;
    protected $table = 'tipo_pedido';
    protected $guarded =[];
    
    public function tipo_pedido(){
        return $this->hasMany('App\Models\Pedido');
    }
}
