<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\TipoCliente;

use DB;

class ClienteController extends Controller
{
    public function create(){

        $tipoCliente = TipoCliente::all();

        return view('frontend/perfil/infocliente', ['tipoCliente'=>$tipoCliente]);
    }

    public function show($id){
       
        $cliente = Cliente::findOrFail($id);

        return view('frontend/perfil/areacliente', ['cliente'=> $cliente]);
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

    public function edit($id){

        $cliente = Cliente::findOrFail($id);
        $tipoCliente = TipoCliente::all();

        return view('frontend/perfil/editarcliente', ['cliente'=> $cliente, 'tipoCliente'=>$tipoCliente]);
    }

    public function update(Request $request){

        Cliente:: findOrFail($request->id)->update($request->all());
    
        return redirect('areacliente/' . $request->id)->with('msg', 'Cliente editado com sucesso!');
    }

    
}
