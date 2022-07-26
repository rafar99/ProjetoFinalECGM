<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCliente extends Model
{
    use HasFactory;
    protected $table =('tipo_cliente');
    protected $guarded=[];

    protected $fillable = [
        'id','descricao'
    ];

    public function tipo_pedido(){
        return $this->hasMany('App\Models\Pedido');
    }
}
