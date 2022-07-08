<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\TipoPedido;
use App\Models\TipoPainel;
use App\Models\Morada;
use Auth;
use DB;


class PedidoController extends Controller
{
    //
    public function index(){
        
        //join à tabela de pedidos

        //$pedido = DB::table('pedido')
         //   ->join('tipo_painel', 'pedido.tipoPainel', '=', 'tipo_painel.id')
         //   ->join('tipo_pedido', 'pedido.tipoPedido', '=', 'tipo_pedido.id')
         //   ->join('morada_pedido', 'pedido.moradaPedido', '=', 'morada_pedido.id')
         //   ->join('funcionario', 'pedido.id_funcionario', '=', 'funcionario.id')
         //   ->select('pedido.*', 'tipo_painel.descricao', 'tipo_pedido.descricao','morada_pedido.rua', 
         //            'morada_pedido.porta', 'morada_pedido.codigo_postal', 'morada_pedido.concelho' )
         //   ->get();

        //seleciona os campos id e descricao da tabela tipo de painel
        $painel = DB::table('tipo_painel')
        ->select('id', 'descricao')
        ->get();
        
        $tipo_pedido = DB::table('tipo_pedido')
        ->select('id', 'descricao')
        ->get();

        return view('/assistencia', ['paineis'=>$painel, 'tipo_pedido'=>$tipo_pedido]);
    }

    public function store(Request $request){

        //Cria um novo pedido de assistencia
        $pedido = new Pedido;
        //guarda a descricao, o id do tipo de painel e o id do tipo de pedido na BD pedido
        $pedido ->descricao = $request->descricao;
        $pedido->tipoPedido= $request->tipoPedido;
        $pedido->tipoPainel= $request->tipoPainel;

        //guardar a morada no pedido e na tabela morada_pedido
        
        
        $pedido->save();
        
        return redirect('/assistencia')->with('msg', 'Submetido com sucesso!');
    
    }

}
