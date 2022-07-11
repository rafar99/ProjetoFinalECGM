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
        $inicio = new Home();
        $inicio->titulo = $request->titulo;
        $inicio->descricao = $request->descricao;
       
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img'), $imageName);
            $inicio->imagem = $imageName;
        }

        $inicio->save();

        return redirect('/admin/info/inicio');
    }


    public function edit($id){
        $inicio = Home::findOrFail($id);
        
        return view('backoffice.info.editar.edit_inicio',['inicio' => $inicio]);
    }

    public function update(Request $request){

        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img'), $imageName);
            $data['image'] = $imageName;
        }
        Home::findOrFail($request->id)->update($data);


        return redirect('/admin/info/inicio')->with('msg', 'Informação alterada com sucesso!');
    }
}
