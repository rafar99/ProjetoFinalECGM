<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoUtilizador;
use DB;
class TipoUtilizadorController extends Controller
{
    public function index() {
        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];
        $utilizadores = TipoUtilizador::all();
        return view('backoffice.tipos.utilizadores.tipoutilizadores',['arr_info' => $arr_info,'utilizadores' => $utilizadores]);
    }
    public function create(){
        return view('backoffice.tipos.utilizadores.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'descricao'=>'required|string|unique:tipo_utilizador'
        ]);
        TipoUtilizador::create([
            'descricao'=>$validated['descricao']
        ]);

        return redirect('/admin/tipoutilizador')->with('msg_create','Tipo de Utilizador criado com sucesso!');
    }
    
    public function edit($id){
        $utilizador_id = TipoUtilizador::findOrFail($id);
        return view('backoffice.tipos.utilizadores.edit',['utilizador_id'=>$utilizador_id,]);
    }

    public function update(Request $request){
        $utilizador = TipoUtilizador::findOrFail($request->id);
        if($request->tipoUtilizador == null){
            return back()->with('error','Campo(s) vazio(s)!');
        }
        $utilizador->descricao = $request->tipoUtilizador;

        $utilizador->save();

        return redirect('/admin/tipoutilizador')->with('msg_edit', 'Tipo de Utilizador alterado com sucesso!');
    }

    public function destroy($id){
        TipoUtilizador::findOrFail($id)->delete();
        return redirect('/admin/tipoutilizador')->with('msg_delete', 'Tipo de Utilizador - ' . $id . ' - eliminado com sucesso!');
    }
}
