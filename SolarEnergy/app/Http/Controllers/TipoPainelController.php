<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoPainel;
use DB;

class TipoPainelController extends Controller
{
    public function index() {
        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];
        $paineis = TipoPainel::all();
        return view('backoffice.tipos.paineis.tipopaineis',['arr_info' => $arr_info,'paineis' => $paineis]);
    }
    public function create(){
        return view('backoffice.tipos.paineis.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'descricao'=>'required|string|unique:tipo_painel'
        ]);
        TipoPainel::create([
            'descricao'=>$validated['descricao']
        ]);

        return redirect('/admin/tipopainel');
    }
    
    public function edit($id){
        $painel_id = TipoPainel::findOrFail($id);
        return view('backoffice.tipos.paineis.edit',['painel_id'=>$painel_id,]);
    }

    public function update(Request $request){
        $painel = TipoPainel::findOrFail($request->id);
        // if($request->tipoEstado > 5){
        //     return back()->with('error_estado','Estado inválido!');
        // }
        $painel->descricao = $request->tipoPainel;

        $painel->save();

        return redirect('/admin/tipopainel')->with('msg', 'Painel alterado!');
    }
}
