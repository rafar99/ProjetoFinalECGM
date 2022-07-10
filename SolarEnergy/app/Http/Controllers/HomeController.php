<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use DB;
class HomeController extends Controller
{
    public function index () {
        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];

        $infos = Home::all();

        return view('backoffice/info/tabelas/inicio', [
            'arr_info' => $arr_info,
            'infos' => $infos
        ]);
    }

    public function create(){
        return view('backoffice.info.inserir.novo_inicio');
    }

    public function store(Request $request){
        $inicio = new Inicio();
        $inicio->titulo = $request->titulo;
        $inicio->descricao = $request->descricao;
        $inicio->imagem = $request->imagem;
        
        $inicio->save();

        return redirect('/admin/info/inicio');
    }
}
