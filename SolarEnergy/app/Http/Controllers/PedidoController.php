<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\TipoPedido;
use App\Models\TipoPainel;
use App\Models\TipoEstado;
use App\Models\Morada;
use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\User;
use App\Models\Disponibilidade;
use Auth;
use Carbon\Carbon;
use DB;

class PedidoController extends Controller
{

    //
    public function index(){
        
        //join à tabela de pedidos

        $tipoUser = auth()->user()->tipoUser_id;  
       
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

        if(auth()->user()->tipoUser_id !=2){
            return redirect()->back()->with('error', 'Não é um cliente válido!');
        }

        //guarda a descricao, o id do tipo de painel e o id do tipo de pedido na BD pedido
        $pedido ->descricao = $request->descricao;
        $pedido->tipoPedido= $request->tipoPedido;
        $pedido->tipoPainel= $request->tipoPainel;
        $pedido->id_cliente = $getClienteLogado->id;
        $pedido->id_estado = '5';

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

        $pedido->id_disponibilidade = $disponibilidade->id;
        
        $pedido->save();
        
        return redirect('/assistencia')->with('msg', 'Submetido com sucesso!');
    
    }



    public function indexAdmin(){
        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];

        //todos os pedidos
        $ass = DB::table('pedido')
        ->leftJoin('tipo_painel','pedido.tipoPainel','=','tipo_painel.id')
        ->leftJoin('tipo_pedido','pedido.tipoPedido','=','tipo_pedido.id')
        ->leftJoin('tipo_estado','pedido.id_estado','=','tipo_estado.id')
        ->leftJoin('cliente','pedido.id_cliente','=','cliente.id')
        ->leftJoin('funcionario','pedido.id_funcionario','=','funcionario.id')
        ->leftJoin('disponibilidade','pedido.id_disponibilidade','=','disponibilidade.id')
        ->leftJoin('morada_pedido as morada', 'pedido.moradaPedido', '=', 'morada.id')
        ->select('pedido.*',
            'tipo_painel.descricao as painel',
            'tipo_pedido.descricao as tipo',
            'tipo_estado.descricao as estado',
            'cliente.nome as cliente',
            'funcionario.nome as funcionario',
            'disponibilidade.dia', 'disponibilidade.hora',
            'morada.rua','morada.porta','morada.codigo_postal','morada.concelho', 'morada.latitude', 'morada.longitude'
        )
        ->get();

        //pedidos finalizados
        $assFin = DB::table('pedido')
        ->leftJoin('tipo_painel','pedido.tipoPainel','=','tipo_painel.id')
        ->leftJoin('tipo_pedido','pedido.tipoPedido','=','tipo_pedido.id')
        ->leftJoin('tipo_estado','pedido.id_estado','=','tipo_estado.id')
        ->leftJoin('cliente','pedido.id_cliente','=','cliente.id')
        ->leftJoin('funcionario','pedido.id_funcionario','=','funcionario.id')
        ->leftJoin('disponibilidade','pedido.id_disponibilidade','=','disponibilidade.id')
        ->leftJoin('morada_pedido as morada', 'pedido.moradaPedido', '=', 'morada.id')
        ->select('pedido.*',
            'tipo_painel.descricao as painel',
            'tipo_pedido.descricao as tipo',
            'tipo_estado.descricao as estado',
            'cliente.nome as cliente',
            'funcionario.nome as funcionario',
            'disponibilidade.dia', 'disponibilidade.hora',
            'morada.rua','morada.porta','morada.codigo_postal','morada.concelho', 'morada.latitude', 'morada.longitude'
        )
        ->where('pedido.id_estado','=','4')
        ->get();

        //pedidos atuais
        $assAtuais = DB::table('pedido')
        ->leftJoin('tipo_painel','pedido.tipoPainel','=','tipo_painel.id')
        ->leftJoin('tipo_pedido','pedido.tipoPedido','=','tipo_pedido.id')
        ->leftJoin('tipo_estado','pedido.id_estado','=','tipo_estado.id')
        ->leftJoin('cliente','pedido.id_cliente','=','cliente.id')
        ->leftJoin('funcionario','pedido.id_funcionario','=','funcionario.id')
        ->leftJoin('disponibilidade','pedido.id_disponibilidade','=','disponibilidade.id')
        ->leftJoin('morada_pedido as morada', 'pedido.moradaPedido', '=', 'morada.id')
        ->select('pedido.*',
            'tipo_painel.descricao as painel',
            'tipo_pedido.descricao as tipo',
            'tipo_estado.descricao as estado',
            'cliente.nome as cliente',
            'funcionario.nome as funcionario',
            'disponibilidade.dia', 'disponibilidade.hora',
            'morada.rua','morada.porta','morada.codigo_postal','morada.concelho', 'morada.latitude', 'morada.longitude'
        )
        ->where('pedido.id_estado','=','3')
        ->get();

        //pedidos P/ executar
        $assPExe = DB::table('pedido')
        ->leftJoin('tipo_painel','pedido.tipoPainel','=','tipo_painel.id')
        ->leftJoin('tipo_pedido','pedido.tipoPedido','=','tipo_pedido.id')
        ->leftJoin('tipo_estado','pedido.id_estado','=','tipo_estado.id')
        ->leftJoin('cliente','pedido.id_cliente','=','cliente.id')
        ->leftJoin('funcionario','pedido.id_funcionario','=','funcionario.id')
        ->leftJoin('disponibilidade','pedido.id_disponibilidade','=','disponibilidade.id')
        ->leftJoin('morada_pedido as morada', 'pedido.moradaPedido', '=', 'morada.id')
        ->select('pedido.*',
            'tipo_painel.descricao as painel',
            'tipo_pedido.descricao as tipo',
            'tipo_estado.descricao as estado',
            'cliente.nome as cliente',
            'funcionario.nome as funcionario',
            'disponibilidade.dia', 'disponibilidade.hora',
            'morada.rua','morada.porta','morada.codigo_postal','morada.concelho', 'morada.latitude', 'morada.longitude'
        )
        ->where('pedido.id_estado','=','5')
        ->get();

        $countAss = DB::table('pedido')->select('*')->get()->count();

        $countAssFinalizadas = DB::table('pedido')->select('*')->where('id_estado','=','4')->get()->count();
        
        $countAssAtuais = DB::table('pedido')->select('*')->where('id_estado','=','3')->get()->count();

        $countAssPorExecutar = DB::table('pedido')->select('*')->where('id_estado','=','5')->get()->count();

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

    public function edit($id){

        $pedido = DB::table('pedido')
        ->leftJoin('tipo_painel as painel','pedido.tipoPainel','=','painel.id')
        ->leftJoin('tipo_estado as est','pedido.id_estado','=','est.id')
        ->leftJoin('funcionario as func','pedido.id_funcionario','=','func.id')
        ->select('pedido.*','painel.descricao as painel','est.descricao as est_desc','func.nome as funcionario')
        ->where('pedido.id','=',$id)
        ->first();
        $funcionarios = Funcionario::where('tipoFuncionario_id','3')->get();
        $tipos = TipoEstado::where('descricao','Like','%desenvolvi%')->get();
        $countEstados = $tipos->count();
        
        if($pedido->id_estado ==4 && $pedido->id_funcionario != 0 && $pedido->tempoExecucaoEmH != null && $pedido->tempoExecucaoEmH != 0 && $pedido->dataExecucao != null){
            return redirect()->back()->with('msg_done', 'Pedido já efetuado!');
        }
        // $funcDisponivel = 
        return view('backoffice.pedidos.edit',['pedido' => $pedido,'tipos' => $tipos,'countEstados' => $countEstados,'funcionarios' => $funcionarios]);
    }

    public function update(Request $request){

        $pedido = Pedido::findOrFail($request->id);
        
        $tipospainel = TipoPainel::all()->count();
        $tiposest = TipoEstado::all()->count();

        
        //Tipos de estado: 3- Em desenvolvimento; 4- Desenvolvido; 5- Não Desenvolvido
        
        //Se o estado é 'Não Desenvolvido', então passa neste if
        if($request->tipoEstado == 5){
            $pedido->id_funcionario = $request->id_funcionario;
            $pedido->id_estado = $request->tipoEstado;
            $pedido->dataExecucao = null;
            $pedido->tempoExecucaoEmH = null;
            $pedido->save();
            return redirect('/admin/dashboard')->with('msg_edit', 'Pedido ' . $request->id . ' alterado com sucesso!');
        } 
        //Se o estado é 'Em Desenvolvimento', então passa neste elseif
        else if($request->tipoEstado == 3) {
            //Se o funcionario estiver selecionado atualiza o pedido, caso contrario mostra um alerta com o erro descrito
            if($request->id_funcionario!=0){
                $pedido->id_funcionario=$request->id_funcionario;
                $pedido->id_estado = $request->tipoEstado;
                $pedido->dataExecucao = Carbon::now()->toDateTimeString();
                $pedido->tempoExecucaoEmH = null;
                $pedido->save();
                return redirect('/admin/dashboard')->with('msg_edit', 'Pedido ' . $request->id . ' alterado com sucesso!');
            } else{
                return redirect()->back()->with('msg_edit', 'Funcionário não associado!');
            }
        }
        //Se o estado é 'Desenvolvido' e todos os campos já tiverem preenchidos, então redireciona de volta para a página anterior com uma mensagem de aviso 
        //Se o estado é 'Desenvolvido', e caso não tenha algum campo preenchido, então passa neste elseif, caso algo estiver errado envia uma mensagem de aviso
        else if($request->tipoEstado == 4){
            if($request->id_funcionario != 0){
                if($request->tempoExecucaoEmH != 0 && $request->tempoExecucaoEmH != null && $request->dataExecucao != null){
                    $pedido->id_funcionario=$request->id_funcionario;
                    $pedido->id_estado = $request->tipoEstado;
                    $pedido->dataExecucao = $request->dataExecucao;
                    $pedido->tempoExecucaoEmH = $request->tempoExecucaoEmH;
                    $pedido->save();
                    return redirect('/admin/dashboard')->with('msg_edit', 'Pedido ' . $request->id . ' alterado com sucesso!');
                } else {
                    return redirect()->back()->with('msg_edit', 'Tempo e/ou Data estão vazios!');
                }
            } else {
                return redirect()->back()->with('msg_edit', 'Funcionário não associado!');
            }
        }
        
    }
}
