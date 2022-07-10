<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NossosProjetos;
use DB;

class NossosProjetosController extends Controller
{
    public function index() {
        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];

        $infos = NossosProjetos::all();

        return view('backoffice/info/tabelas/nossosprojetos', [
            'arr_info' => $arr_info,
            'infos' => $infos
        ]);
    }

    public function create(){
        return view('backoffice.info.inserir.novo_nossosprojetos');
    }

    public function store(Request $request){
        $np = new NossosProjetos();
        $np->titulo = $request->titulo;
        $np->descricao = $request->descricao;
        $np->imagem = $request->imagem;
        
        $np->save();

        return redirect('/admin/info/nossosprojetos');
    }
}
