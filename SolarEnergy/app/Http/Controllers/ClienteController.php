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
        $temConta = Cliente::select('utilizador_id')->where('utilizador_id',$userId)->first();
        if($temConta!==null){
            return redirect('dashboard');
        }
        return view('frontend/perfil/infocliente', ['tipoCliente'=>$tipoCliente,'userId'=>$userId]);
    }

    public function store(Request $request){
        
        $userId = auth()->user()->id;
        $cliente = new Cliente;

        $cliente->nome = $request->nome;
        $cliente->contacto = $request->contacto;
        $cliente->nif = $request->nif;
        $cliente->morada = $request->morada;
        
        $cliente->tipoCliente= $request->tipoCliente;
        $cliente->utilizador_id = $userId;

        $cliente->save();

        return redirect('/');

    }

    public function show($id){
        $cliente = Cliente::findOrFail($id);
        $listaAssistencia = DB::table('pedido')
        ->leftJoin('tipo_painel', 'pedido.tipoPainel', '=', 'tipo_painel.id')
        ->leftJoin('tipo_pedido', 'pedido.tipoPedido', '=', 'tipo_pedido.id')
        ->leftJoin('cliente', 'pedido.id_cliente', '=', 'cliente.id')
        ->leftJoin('tipo_estado', 'pedido.estado', '=', 'tipo_estado.id')
        ->where('cliente.utilizador_id', auth()->user()->id)
        ->select('pedido.*', 'tipo_estado.descricao as estado', 'tipo_painel.descricao as painel', 'tipo_pedido.descricao as tipo')
        ->get();

        $countAssistencias = $listaAssistencia->count();
        
        if(auth()->user()->ativo!=1){
            Session::flush();        
            Auth::logout();
            return redirect('/login')->with('msg', 'A sua conta está desativada! Envie um email através do formulário de contactos caso queira recuperá-la.');
        }
        return view('frontend/perfil/areacliente', ['cliente'=> $cliente,'listaAssistencia'=> $listaAssistencia,'nAssistencias'=>$countAssistencias]);
    }

    public function desativar(Request $request){
        $user = User::findOrFail(auth()->user()->id);
        $user->ativo = $request->ativo;
        $user->save();
        Session::flush();        
        Auth::logout();
        return redirect('/');

    }

    public function edit($id){

        $cliente = Cliente::findOrFail($id);
        $tipoCliente = TipoCliente::all();
        
        if($cliente->utilizador_id!=auth()->user()->id){
            return back();
        }
        return view('frontend/perfil/editarcliente', ['cliente'=> $cliente, 'tipoCliente'=>$tipoCliente]);
    }

    public function update(Request $request){

        Cliente::findOrFail($request->id)->update($request->all());
        return redirect('areacliente/' . $request->id)->with('msg', 'Cliente editado com sucesso!');
    }

    
}
