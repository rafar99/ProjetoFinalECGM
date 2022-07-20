<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEstado;
use DB;

class TipoEstadoController extends Controller
{
    public function index() {
        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];
        $estados = TipoEstado::all();
        return view('backoffice.tipos.estados.tipoestados',['arr_info' => $arr_info,'estados' => $estados]);
    }

    public function create(){
        return view('backoffice.tipos.estados.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'descricao'=>'required|string|unique:tipo_estado'
        ]);
        TipoEstado::create([
            'descricao'=>$validated['descricao']
        ]);

        return redirect('/admin/tipocliente');
    }
    public function edit($id){
        $estado_id = TipoEstado::findOrFail($id);
        return view('backoffice.tipos.estados.edit',['estado_id'=>$estado_id,]);
    }

    public function update(Request $request){
        $estado = TipoEstado::findOrFail($request->id);
        // if($request->tipoEstado > 5){
        //     return back()->with('error_estado','Estado inválido!');
        // }
        $estado->descricao = $request->tipoEstado;

        $estado->save();

        return redirect('/admin/tipoestado')->with('msg', 'Marcado como ' . $request->tipoEstado . '!');
    }
}
