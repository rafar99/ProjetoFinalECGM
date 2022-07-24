<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Contactos;
use App\Models\Cliente;
use DB;

class ContactosController extends Controller
{
    public function index() {

        $contactos = Contactos::all();
        
        if(auth()->user()==null){
            return view('frontend/forms/contactos', ['contactos'=>$contactos]);
        }
        if(auth()->user()->ativo!=1){
            Session::flush();        
            Auth::logout();
            return redirect('/login')->with('msg', 'A sua conta está desativada! Envie um email através do formulário de contactos caso queira recuperá-la.');
        }
        $cliente = Cliente::where('utilizador_id',auth()->user()->id)->first();
        return view('frontend/forms/contactos', ['contactos'=>$contactos,'cliente'=>$cliente]);
    }

    public function indexAdmin(){
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
    public function edit($id){
        $contactos = Contactos::findOrFail($id);
        
        return view('backoffice.info.editar.edit_contactos',['contactos' => $contactos]);
    }

    public function update(Request $request){

        $data = $request->all();
        Contactos::findOrFail($request->id)->update($data);


        return redirect('/admin/info/contactos')->with('msg', 'Informação alterada com sucesso!');
    }
}