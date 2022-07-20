<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoPedido;
use App\Models\Pedido;
use DB;
class TipoPedidoController extends Controller
{
    public function index() {
        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];
        $tipopedidos = TipoPedido::all();
        $ct = 1;
        // $tipo = TipoPedido::where('id','4')->first();
        foreach($tipopedidos as $tipopedido){
            $getTempo = Pedido::where('tipoPedido',$tipopedido->id)->sum('tempoExecucaoEmH');
            // if($tipopedido->id==2)dd($getTempo/(Pedido::where('tipoPedido',$tipopedido->id)->count('tempoExecucaoEmH')));
            $nPedido = Pedido::where('tipoPedido',$tipopedido->id)->count('tempoExecucaoEmH');
            
            if($nPedido==0) 
                $tempoMedio = 0;
            else
                $tempoMedio = $getTempo / $nPedido;
            $tipo = TipoPedido::where('id',$ct)->first();
            
            if($tipo==null) $ct++;
            
            $tipo->tempoMedioExecucaoEmH = $tempoMedio;
            $tipo->save();
            $ct++;
        }

        return view('backoffice.tipos.pedidos.tipopedidos',['arr_info' => $arr_info,'pedidos' => $tipopedidos]);
    }
    public function create(){
        return view('backoffice.tipos.pedidos.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'descricao'=>'required|string|unique:tipo_pedido',
            'precoBase'=>'required'
        ]);  
        TipoPedido::create([
            'descricao'=>$validated['descricao'],
            'tempoMedioExecucaoEmH'=>'0',
            'precoBase'=>$validated['precoBase']
        ]);

        return redirect('/admin/tipopedido');
    }
    
    public function edit($id){
        $pedido_id = TipoPedido::findOrFail($id);
        return view('backoffice.tipos.pedidos.edit',['pedido_id'=>$pedido_id]);
    }

    public function update(Request $request){
        $pedido = TipoPedido::findOrFail($request->id);
        // if($request->tipoEstado > 5){
        //     return back()->with('error_estado','Estado inválido!');
        // }
        $pedido->descricao = $request->tipoPedido;
        $pedido->precoBase = $request->tipoPreco;

        $pedido->save();

        return redirect('/admin/tipopedido')->with('msg', ' ');
    }}
