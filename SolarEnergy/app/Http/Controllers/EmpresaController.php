<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Funcionario;
use App\Models\Cliente;

use DB;

class EmpresaController extends Controller
{
    //

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

        $funcionarios = Funcionario::all();
        if(auth()->user()==null){
            return view('frontend/info/empresa', ['quemsomos'=>$quemsomos, 'equipa'=>$equipa, 'funcionarios'=>$funcionarios]);
        }
        $cliente = Cliente::where('utilizador_id',auth()->user()->id)->first();
        return view('frontend/info/empresa', ['cliente'=>$cliente,'quemsomos'=>$quemsomos, 'equipa'=>$equipa, 'funcionarios'=>$funcionarios]);
    }
}
