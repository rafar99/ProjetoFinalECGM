<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactos;
use DB;

class ContactosController extends Controller
{
    public function index() {
        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];

        $infos = Contactos::all();

        return view('backoffice/info/tabelas/contactos', [
            'arr_info' => $arr_info,
            'infos' => $infos
        ]);
    }
    public function create(){
        return view('backoffice.info.inserir.novo_contactos');
    }

    public function store(Request $request){
        $contacto = new Contactos();
        $contacto->num_telefone = $request->telefone;
        $contacto->morada = $request->morada;
        $contacto->email = $request->email;
        $contacto->mapa = $request->mapa;
        
        $contacto->save();

        return redirect('/admin/info/contactos');
    }
}
