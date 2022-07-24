<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Home;
use App\Models\NossosProjetos;
use App\Models\TipoPainel;
use App\Models\Cliente;
use DB;
class HomeController extends Controller
{

    public function index(){

        //select à tabela empresa

        $secaoUm = DB::table('home')
        ->select('id', 'titulo', 'descricao', 'imagem')
        ->where ('id', '1')
        ->get();

        $infoCard = DB::table('home')
        ->select('id', 'titulo', 'descricao', 'imagem')
        ->where ('id', '2')
        ->get();

        $infoProjetos = DB::table('home')
        ->select('id', 'titulo', 'descricao', 'imagem')
        ->where ('id', '3')
        ->get();

        $nossosprojetos = NossosProjetos::all();

        $tipo_painel = DB::table('tipo_painel')
        ->take(4)->get();

        if(auth()->user()==null){
            return view('frontend/info/dashboard', ['secaoUm'=>$secaoUm, 'infoCard'=>$infoCard, 'nossosprojetos'=>$nossosprojetos, 'infoProjetos'=>$infoProjetos,'tipo_painel'=>$tipo_painel]);            
        } 
        if(auth()->user()->ativo!=1){
            Session::flush();        
            Auth::logout();
            return redirect('/login')->with('msg', 'A sua conta está desativada! Envie um email através do formulário de contactos caso queira recuperá-la.');
        }
        $cliente = Cliente::where('utilizador_id',auth()->user()->id)->first();
        return view('frontend/info/dashboard', ['cliente'=>$cliente,'secaoUm'=>$secaoUm, 'infoCard'=>$infoCard, 'nossosprojetos'=>$nossosprojetos, 'infoProjetos'=>$infoProjetos,'tipo_painel'=>$tipo_painel]);
    }

    public function indexAdmin() {
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
