<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\TipoPedido;
use App\Models\TipoPainel;
use App\Models\TipoEstado;
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

        $tipoUser = auth()->user()->tipoUser_id;
        $pedido = DB::table('pedido')
            ->leftJoin('tipo_painel', 'pedido.tipoPainel', '=', 'tipo_painel.id')
            ->leftJoin('tipo_pedido', 'pedido.tipoPedido', '=', 'tipo_pedido.id')
            ->leftJoin('morada_pedido', 'pedido.moradaPedido', '=', 'morada_pedido.id')
            ->leftJoin('funcionario', 'pedido.id_funcionario', '=', 'funcionario.id')
            ->leftJoin('cliente', 'pedido.id_cliente', '=', 'cliente.id')
            ->select('pedido.*', 'tipo_painel.descricao', 'tipo_pedido.descricao','morada_pedido.rua', 
                     'morada_pedido.porta', 'morada_pedido.codigo_postal', 'morada_pedido.concelho' )
            ->get();

        $cliente = DB::table('cliente')
            ->leftJoin('disponibilidade', 'cliente.disponibilidade', '=', 'disponibilidade.id')
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
        
        return view('frontend/forms/assistencia', ['paineis'=>$painel, 'tipo_pedido'=>$tipo_pedido, 'cliente'=>$cliente,'tipoUser'=>$tipoUser]);
        
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



    public function indexAdmin(){
        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];

        //todos os pedidos
        $ass = DB::table('pedido')
        ->leftJoin('tipo_painel','pedido.tipoPainel','=','tipo_painel.id')
        ->leftJoin('tipo_pedido','pedido.tipoPedido','=','tipo_pedido.id')
        ->leftJoin('tipo_estado','pedido.estado','=','tipo_estado.id')
        ->leftJoin('cliente','pedido.id_cliente','=','cliente.id')
        ->leftJoin('morada_pedido as morada', 'pedido.moradaPedido', '=', 'morada.id')
        ->select('pedido.*','tipo_painel.descricao as painel','tipo_pedido.descricao as tipo','tipo_estado.descricao as estado','cliente.nome as cliente','morada.rua','morada.porta','morada.codigo_postal','morada.concelho', 'morada.latitude', 'morada.longitude')
        ->get();

        //pedidos finalizados
        $assFin = DB::table('pedido')
        ->leftJoin('tipo_painel','pedido.tipoPainel','=','tipo_painel.id')
        ->leftJoin('tipo_pedido','pedido.tipoPedido','=','tipo_pedido.id')
        ->leftJoin('tipo_estado','pedido.estado','=','tipo_estado.id')
        ->leftJoin('cliente','pedido.id_cliente','=','cliente.id')
        ->leftJoin('morada_pedido as morada', 'pedido.moradaPedido', '=', 'morada.id')
        ->select('pedido.*','tipo_painel.descricao as painel','tipo_pedido.descricao as tipo','tipo_estado.descricao as estado','cliente.nome as cliente','morada.rua','morada.porta','morada.codigo_postal','morada.concelho', 'morada.latitude', 'morada.longitude')
        ->where('pedido.estado','=','3')
        ->get();

        //pedidos atuais
        $assAtuais = DB::table('pedido')
        ->leftJoin('tipo_painel','pedido.tipoPainel','=','tipo_painel.id')
        ->leftJoin('tipo_pedido','pedido.tipoPedido','=','tipo_pedido.id')
        ->leftJoin('tipo_estado','pedido.estado','=','tipo_estado.id')
        ->leftJoin('cliente','pedido.id_cliente','=','cliente.id')
        ->leftJoin('morada_pedido as morada', 'pedido.moradaPedido', '=', 'morada.id')
        ->select('pedido.*','tipo_painel.descricao as painel','tipo_pedido.descricao as tipo','tipo_estado.descricao as estado','cliente.nome as cliente','morada.rua','morada.porta','morada.codigo_postal','morada.concelho', 'morada.latitude', 'morada.longitude')
        ->where('pedido.estado','=','4')
        ->get();

        //pedidos P/ executar
        $assPExe = DB::table('pedido')
        ->leftJoin('tipo_painel','pedido.tipoPainel','=','tipo_painel.id')
        ->leftJoin('tipo_pedido','pedido.tipoPedido','=','tipo_pedido.id')
        ->leftJoin('tipo_estado','pedido.estado','=','tipo_estado.id')
        ->leftJoin('cliente','pedido.id_cliente','=','cliente.id')
        ->leftJoin('morada_pedido as morada', 'pedido.moradaPedido', '=', 'morada.id')
        ->select('pedido.*','tipo_painel.descricao as painel','tipo_pedido.descricao as tipo','tipo_estado.descricao as estado','cliente.nome as cliente','morada.rua','morada.porta','morada.codigo_postal','morada.concelho', 'morada.latitude', 'morada.longitude')
        ->where('pedido.estado','=','5')
        ->get();

        $countAss = DB::table('pedido')->select('*')->get()->count();

        $countAssFinalizadas = DB::table('pedido')->select('*')->where('estado','=','3')->get()->count();
        
        $countAssAtuais = DB::table('pedido')->select('*')->where('estado','=','4')->get()->count();

        $countAssPorExecutar = DB::table('pedido')->select('*')->where('estado','=','5')->get()->count();

        return view('backoffice.pedidos.dashboard',[
            'arr_info' => $arr_info, 
            'assistencias'=>$ass,
            'assFin' =>$assFin,
            'assAtuais' =>$assAtuais,
            'assPExe' =>$assPExe,
            'countAss'=>$countAss,
            'countAssFinalizadas'=>$countAssFinalizadas,
            'countAssAtuais'=>$countAssAtuais,
            'countAssPorExecutar'=>$countAssPorExecutar
        ]);
    }
}
