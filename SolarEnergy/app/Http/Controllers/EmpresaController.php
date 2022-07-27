<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;        
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Empresa;
use App\Models\Funcionario;
use App\Models\Cliente;
use DB;
class EmpresaController extends Controller
{
    public function index(){

        //select à tabela empresa

        $quemsomos = DB::table('empresa')
        ->select('id', 'titulo', 'descricao', 'imagem')
        ->where ('id', '1')
        ->get();

        $equipa = DB::table('empresa')
        ->select('id', 'titulo', 'descricao', 'imagem')
        ->where ('id', '2')
        ->get();


        $funcionarios = Funcionario::
        leftJoin('tipo_funcionario as tf','funcionario.tipoFuncionario_id','=','tf.id')
        ->select('tf.descricao as funcao','funcionario.nome','funcionario.contacto','funcionario.foto')
        ->limit(4)
        ->get();
       
         if(auth()->user()==null){
            return view('frontend/info/empresa', ['quemsomos'=>$quemsomos, 'equipa'=>$equipa, 'funcionarios'=>$funcionarios]);
        }
        if(auth()->user()->ativo!=1){
            Session::flush();        
            Auth::logout();
            return redirect('/login')->with('msg', 'A sua conta está desativada! Envie um email através do formulário de contactos caso queira recuperá-la.');
        }
        
        $cliente = Cliente::where('utilizador_id',auth()->user()->id)->first();
        return view('frontend/info/empresa', ['cliente'=>$cliente,'quemsomos'=>$quemsomos, 'equipa'=>$equipa, 'funcionarios'=>$funcionarios]);
    }

    
    public function indexAdmin() {
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
       
        if($request->titulo==null && $request->descricao == null){
            return redirect('/admin/info/empresa')->with('msg_none','Nenhuma informação adicionada!');
        }

        $empresa->titulo = $request->titulo;
        $empresa->descricao = $request->descricao;

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImage = $request->file('imagem');
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img'), $imageName);
            $empresa->imagem = $imageName;
        }
       
        $empresa->save();

        return redirect('/admin/info/empresa')->with('msg_create','Informação de Empresa criada com sucesso!');
    }

    public function edit($id){
        $empresa = Empresa::findOrFail($id);
        
        return view('backoffice.info.editar.edit_empresa',['empresa' => $empresa]);
    }

    public function update(Request $request){

        $data = $request->all();

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImage = $request->imagem;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img'), $imageName);
            $data['imagem'] = $imageName;
        }
        Empresa::findOrFail($request->id)->update($data);


        return redirect('/admin/info/empresa')->with('msg_edit', 'Informação de Empresa - ' . $request->id .' - alterada com sucesso!');
    }

    public function destroy($id){
        Empresa::findOrFail($id)->delete();
        return redirect('/admin/info/empresa')->with('msg_delete', 'Informação de Empresa - ' . $id . ' - eliminada com sucesso!');
    }
}
