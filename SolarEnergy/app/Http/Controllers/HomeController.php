<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\NossosProjetos;

use DB;

class HomeController extends Controller
{
    //
    public function index(){

        //select à tabela empresa

        $secaoUm = DB::table('home')
        ->select('id', 'titulo', 'descricao', 'imagem')
        ->where ('id', '1')
        ->get();

        $secaoDois = DB::table('home')
        ->select('id', 'titulo', 'descricao', 'imagem')
        ->where ('id', '2')
        ->get();

        $nossosprojetos = NossosProjetos::all();

        return view('dashboard', ['secaoUm'=>$secaoUm, 'secaoDois'=>$secaoDois, 'nossosprojetos'=>$nossosprojetos]);
    }
}
