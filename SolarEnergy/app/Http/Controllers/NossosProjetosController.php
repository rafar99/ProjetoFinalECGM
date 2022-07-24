<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NossosProjetos;
use DB;

class NossosProjetosController extends Controller
{
    public function indexAdmin() {
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
        // $np->imagem = $request->imagem;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img'), $imageName);
            $np->imagem = $imageName;
        }
        $np->save();

        return redirect('/admin/info/nossosprojetos');
    }
    public function edit($id){
        $nossosprojetos = NossosProjetos::findOrFail($id);
        
        return view('backoffice.info.editar.edit_nossosprojetos',['nossosprojetos' => $nossosprojetos]);
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
        NossosProjetos::findOrFail($request->id)->update($data);


        return redirect('/admin/info/nossosprojetos')->with('msg', 'Informação alterada com sucesso!');
    }
}
