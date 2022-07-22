<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = "pedido";
    protected $guarded =[];

    protected $fillable = [
        'descricao','dataExecucao','tipoPainel','tipoPedido','moradaPedido', 'id_funcionario', 'estado'
    ];

    public function tipoEstado(){
        return $this->hasMany(TipoEstado::class);
    }

    public function tipoPedido(){
        return $this->hasMany(TipoPedido::class);
    }

    public function tipoPainel(){
        return $this->hasMany(TipoPainel::class);
    }

    public function morada(){
        return $this->belongTo(Morada::class);
    }

    public function cliente(){
        return $this->hasMany(Cliente::class);
    }

}
