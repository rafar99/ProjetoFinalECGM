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

        return view('/infocliente', ['tipoCliente'=>$tipoCliente]);
    }

    public function show($id){
       
        $cliente = Cliente::findOrFail($id);

        return view('areacliente', ['cliente'=> $cliente]);
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

    
}
