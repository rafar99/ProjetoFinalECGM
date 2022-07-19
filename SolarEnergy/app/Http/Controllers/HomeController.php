<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\NossosProjetos;
use App\Models\TipoPainel;
use App\Models\Cliente;

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
        
        $cliente = Cliente::where('utilizador_id',auth()->user()->id)->first();
        return view('frontend/info/dashboard', ['cliente'=>$cliente,'secaoUm'=>$secaoUm, 'infoCard'=>$infoCard, 'nossosprojetos'=>$nossosprojetos, 'infoProjetos'=>$infoProjetos,'tipo_painel'=>$tipo_painel]);
        
    }
}
