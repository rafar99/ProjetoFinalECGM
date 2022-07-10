<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use DB;
class EmpresaController extends Controller
{
    public function index() {
        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];

        $infos = Empresa::all();

        return view('backoffice/info/tabelas/empresa', [
            'arr_info' => $arr_info,
            'infos' => $infos
        ]);
    }

    public function create(){
        return view('backoffice.info.inserir.novo_empresa');
    }

    public function store(Request $request){
        $empresa = new Empresa();
        $empresa->titulo = $request->titulo;
        $empresa->descricao = $request->descricao;
        $empresa->imagem = $request->imagem;
        
        $empresa->save();

        return redirect('/admin/info/empresa');
    }
}
