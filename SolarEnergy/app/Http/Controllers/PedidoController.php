<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\TipoPedido;
use App\Models\TipoPainel;
use App\Models\Morada;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Disponibilidade;
use Auth;
use DB;


class PedidoController extends Controller
{
    //
    public function index(){
        
        //join à tabela de pedidos

        $pedido = DB::table('pedido')
            ->join('tipo_painel', 'pedido.tipoPainel', '=', 'tipo_painel.id')
            ->join('tipo_pedido', 'pedido.tipoPedido', '=', 'tipo_pedido.id')
            ->join('morada_pedido', 'pedido.moradaPedido', '=', 'morada_pedido.id')
            ->join('funcionario', 'pedido.id_funcionario', '=', 'funcionario.id')
            ->join('cliente', 'pedido.id_cliente', '=', 'cliente.id')
            ->select('pedido.*', 'tipo_painel.descricao', 'tipo_pedido.descricao','morada_pedido.rua', 
                     'morada_pedido.porta', 'morada_pedido.codigo_postal', 'morada_pedido.concelho' )
            ->get();

        $cliente = DB::table('cliente')
            ->join('disponibilidade', 'cliente.disponibilidade', '=', 'disponibilidade.id')
            ->select('cliente.*', 'disponibilidade.dia', 'disponibilidade.hora')
            ->get();
        
       

        //seleciona os campos id e descricao da tabela tipo de painel
        $painel = DB::table('tipo_painel')
        ->select('id', 'descricao')
        ->get();
        
        $tipo_pedido = DB::table('tipo_pedido')
        ->select('id', 'descricao')
        ->get();

        $cliente= Cliente::where('utilizador_id',auth()->user()->id)->first();
        return view('frontend/forms/assistencia', ['paineis'=>$painel, 'tipo_pedido'=>$tipo_pedido, 'cliente'=>$cliente]);
    }

    public function store(Request $request){

        
        $getClienteLogado= Cliente::where('utilizador_id',auth()->user()->id)->first();
        $pedido = new Pedido;

        //guarda a descricao, o id do tipo de painel e o id do tipo de pedido na BD pedido
        $pedido ->descricao = $request->descricao;
        $pedido->tipoPedido= $request->tipoPedido;
        $pedido->tipoPainel= $request->tipoPainel;
        $pedido->id_cliente = $getClienteLogado->id;
        $pedido->estado = '5';

        //guardar a morada no pedido e na tabela morada_pedido

        $morada = null;
        $matchThese = [
            'rua'=>$request->rua,
            'porta'=>$request->porta,
            'codigo_postal'=>$request->codigo_postal,
            'concelho'=>$request->concelho];
        $moradaExists = Morada::where($matchThese)->first();

        if($moradaExists !== null){
            $morada = $moradaExists;
        } else {
            $morada = new Morada;
            $morada->rua = $request->rua;
            $morada -> porta = $request->porta;
            $morada -> codigo_postal = $request->codigo_postal;
            $morada -> concelho = $request->concelho;
            //$morada -> latitude = 1;
            //$morada -> longitude = 1;
            $morada->save();
        }

        $pedido->moradaPedido = $morada->id;

        
        $dispcliente = null;

        $dispcliente = [
            'dia'=>$request->dia,
            'hora'=>$request->hora];

        $disponibilidadeExists = Disponibilidade::where($dispcliente)->first();

        if($disponibilidadeExists !== null){
            $disponibilidade = $disponibilidadeExists;
        } else {

            $disponibilidade =new Disponibilidade;
            $disponibilidade->dia =$request->dia;
            $disponibilidade->hora =$request->hora;

            $disponibilidade->save();

        }

        // var_dump($getClienteLogado->disponibilidade); die;
        $getClienteLogado->disponibilidade = $disponibilidade->id;
        $getClienteLogado->save();
        
        $pedido->save();
        
        return redirect('/assistencia')->with('msg', 'Submetido com sucesso!');
    
    }

}
