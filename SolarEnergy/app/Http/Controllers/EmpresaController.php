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

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img'), $imageName);
            $empresa->imagem = $imageName;
        }
        $empresa->save();

        return redirect('/admin/info/empresa');
    }

    public function edit($id){
        $empresa = Empresa::findOrFail($id);
        
        return view('backoffice.info.editar.edit_empresa',['empresa' => $empresa]);
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
        Empresa::findOrFail($request->id)->update($data);


        return redirect('/admin/info/empresa')->with('msg', 'Informação alterada com sucesso!');
    }
}