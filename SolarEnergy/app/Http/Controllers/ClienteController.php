<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\TipoCliente;
use App\Models\Pedido;
use DB;

class ClienteController extends Controller
{
    public function create(){

        $tipoCliente = TipoCliente::all();

        $userId = auth()->user()->id;
        $temConta = Cliente::select('utilizador_id')->where('utilizador_id',$userId)->first();
        // var_dump($temConta);die;
        if($temConta!==null){
            return redirect('dashboard');
        }
        return view('frontend/perfil/infocliente', ['tipoCliente'=>$tipoCliente,'userId'=>$userId]);
    }

        
    //ver erro aqui 
    public function store(Request $request){
        
        $userId = auth()->user()->id;
        // var_dump($userId);die;
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
        // var_dump($id);die;
        $listaAssistencia = DB::table('pedido')
        ->leftJoin('tipo_estado', 'pedido.estado', '=', 'tipo_estado.id')
        ->leftJoin('tipo_painel', 'pedido.tipoPainel', '=', 'tipo_painel.id')
        ->leftJoin('tipo_pedido', 'pedido.tipoPedido', '=', 'tipo_pedido.id')
        ->leftJoin('cliente', 'pedido.id_cliente', '=', 'cliente.id')
        ->where('cliente.id', auth()->user()->id)
        ->select('pedido.*', 'tipo_estado.descricao as estado', 'tipo_painel.descricao as painel', 'tipo_pedido.descricao as tipo')
        ->get();
        
        $cliente = Cliente::where('utilizador_id',auth()->user()->id)->first();

        return view('frontend/perfil/areacliente', ['cliente'=> $cliente,'listaAssistencia'=> $listaAssistencia]);


        
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

        Cliente:: findOrFail($request->id)->update($request->all());
    
        return redirect('areacliente/' . $request->id)->with('msg', 'Cliente editado com sucesso!');
    }

    
}
