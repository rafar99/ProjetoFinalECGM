<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cliente;
use App\Models\User;
use App\Models\TipoCliente;
use App\Models\Pedido;
use DB;

class ClienteController extends Controller
{
    public function create(){

        $tipoCliente = TipoCliente::all();

        $userId = auth()->user()->id;

        //verifica se o utilizador já tem conta de cliente, caso tenha, redireciona para o inicio  
        $temConta = Cliente::select('utilizador_id')->where('utilizador_id',$userId)->first();
        if($temConta!==null){
            return redirect('dashboard');
        }
        return view('frontend/perfil/infocliente', ['tipoCliente'=>$tipoCliente,'userId'=>$userId]);
    }

    public function store(Request $request){
        
        //guarda as informaçoes de cliente do utilizador acabado de criar conta
        $userId = auth()->user()->id;
        $cliente = new Cliente;

        $cliente->nome = $request->nome;
        $cliente->contacto = $request->contacto;
        $cliente->nif = $request->nif;
        $cliente->morada = $request->morada;
        
        $cliente->tipoCliente= $request->tipoCliente;
        $cliente->utilizador_id = $userId;

        $cliente->save();

        return redirect('/')->with('email_verify','Foi enviado um email para verificar a conta!');

    }

    public function show($id){
        //lista a informação do cliente logado e os seus pedidos
        $cliente = Cliente::where('cliente.id','=',$id)
        ->leftJoin('users','cliente.utilizador_id','=','users.id')
        ->leftJoin('tipo_cliente','cliente.tipoCliente','=','tipo_cliente.id')
        ->select('cliente.id','cliente.nome','cliente.morada','cliente.nif','cliente.contacto',
            'users.name','users.email',
            'tipo_cliente.descricao as tipocliente')
        ->first();
        
        $listaAssistencia = DB::table('pedido')
        ->leftJoin('tipo_painel', 'pedido.tipoPainel', '=', 'tipo_painel.id')
        ->leftJoin('tipo_pedido', 'pedido.tipoPedido', '=', 'tipo_pedido.id')
        ->leftJoin('cliente', 'pedido.id_cliente', '=', 'cliente.id')
        ->leftJoin('tipo_estado', 'pedido.id_estado', '=', 'tipo_estado.id')
        ->leftJoin('disponibilidade', 'pedido.id_disponibilidade', '=', 'disponibilidade.id')
        ->where('cliente.utilizador_id', auth()->user()->id)
        ->select('pedido.*', 
            'tipo_estado.descricao as estado',
            'tipo_painel.descricao as painel', 
            'tipo_pedido.descricao as tipo',
            'disponibilidade.dia', 'disponibilidade.hora'
         )
        ->get();

        //total de assistencias deste cliente
        $countAssistencias = $listaAssistencia->count();
        
        //verifica se o utilizador tem a conta ativada
        if(auth()->user()->ativo!=1){
            Session::flush();        
            Auth::logout();
            return redirect('/login')->with('msg', 'A sua conta está desativada! Envie um email através do formulário de contactos caso queira recuperá-la.');
        }
        return view('frontend/perfil/areacliente', ['cliente'=> $cliente,'listaAssistencia'=> $listaAssistencia,'nAssistencias'=>$countAssistencias]);
    }

    //Desativa conta do proprio utilizador e faz logout
    public function desativar(Request $request){
        $user = User::findOrFail(auth()->user()->id);
        $user->ativo = $request->ativo;
        $user->save();
        Session::flush();        
        Auth::logout();
        return redirect('/');
    }

    // editar o cliente atual
    public function edit($id){

        $cliente = Cliente::findOrFail($id);
        $tipoCliente = TipoCliente::all();
        
        if($cliente->utilizador_id!=auth()->user()->id){
            return back();
        }
        return view('frontend/perfil/editarcliente', ['cliente'=> $cliente, 'tipoCliente'=>$tipoCliente]);
    }

    //guardar as alterações
    public function update(Request $request){

        Cliente::findOrFail($request->id)->update($request->all());
        return redirect('areacliente/' . $request->id)->with('msg_edit', 'Cliente alterado com sucesso!');
    }

    
}
