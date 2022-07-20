<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoCliente;
use DB;

class TipoClienteController extends Controller
{
    public function index() {
        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];
        $clientes = TipoCliente::all();
        return view('backoffice.tipos.clientes.tipoclientes',['arr_info' => $arr_info,'clientes' => $clientes]);
    }

    public function create(){
        return view('backoffice.tipos.clientes.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'descricao'=>'required|string|unique:tipo_cliente'
        ]);
        TipoCliente::create([
            'descricao'=>$validated['descricao']
        ]);

        return redirect('/admin/tipocliente');
    }


    public function edit($id){
        $cliente_id = TipoCliente::findOrFail($id);
        return view('backoffice.tipos.clientes.edit',['cliente_id'=>$cliente_id]);
    }

    public function update(Request $request){
        $cliente = TipoCliente::findOrFail($request->id);
        // if($request->tipoCliente > 5){
        //     return back()->with('error_cliente','cliente inválido!');
        // }
        $cliente->descricao = $request->tipoCliente;

        $cliente->save();

        return redirect('/admin/tipocliente')->with('msg', ' ');
    }
}
