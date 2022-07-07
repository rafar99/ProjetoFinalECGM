<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PedidoAssistencia;
use App\Models\TipoPedido;
use App\Models\TipoPainel;
use DB;

class PedidoAssistenciaController extends Controller
{
    //

    public function index(){

        //seleciona os campos id e descricao da tabela tipo de painel
        $painel = DB::table('tipo_painel')
        ->select('id', 'descricao')
        ->get();
        
        $tipo_pedido = DB::table('tipo_pedido')
        ->select('id', 'descricao')
        ->get();

        return view('/assistencia', ['paineis'=>$painel, 'tipo_pedido'=>$tipo_pedido]);
    }
}
