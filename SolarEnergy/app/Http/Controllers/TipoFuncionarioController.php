<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoFuncionario;
use DB;

class TipoFuncionarioController extends Controller
{
    public function index() {
        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];
        $funcionarios = TipoFuncionario::all();
        return view('backoffice.tipos.funcionarios.tipofuncionarios',['arr_info' => $arr_info,'funcionarios' => $funcionarios]);
    }

    public function create(){
        return view('backoffice.tipos.funcionarios.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'descricao'=>'required|string|unique:tipo_funcionario'
        ]);
        TipoFuncionario::create([
            'descricao'=>$validated['descricao']
        ]);

        return redirect('/admin/tipofuncionario');
    }
    
    public function edit($id){
        $funcionario_id = TipoFuncionario::findOrFail($id);
        return view('backoffice.tipos.funcionarios.edit',['funcionario_id'=>$funcionario_id,]);
    }

    public function update(Request $request){
        $funcionario = TipoFuncionario::findOrFail($request->id);
        // if($request->tipofuncionario > 5){
        //     return back()->with('error_funcionario','funcionario inválido!');
        // }
        $funcionario->descricao = $request->tipoFuncionario;

        $funcionario->save();

        return redirect('/admin/tipofuncionario')->with('msg', ' ');
    }
}
