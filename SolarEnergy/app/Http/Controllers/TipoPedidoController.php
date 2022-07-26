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
        $tempoMedio = 0;
        
        foreach($tipopedidos as $tipopedido){
            $getTempo = Pedido::where('tipoPedido',$tipopedido->id)->sum('tempoExecucaoEmH');
            $nPedido = Pedido::where('tipoPedido',$tipopedido->id)->count('tempoExecucaoEmH');
            
            if($nPedido==0) {
                $tempoMedio = 0;
            }
            else
                $tempoMedio = $getTempo / $nPedido;
            $tipo = TipoPedido::where('id',$ct)->first();
            
            if($tipo==null) 
                $ct++;
            else{
                $tipo->tempoMedioExecucaoEmH = $tempoMedio;
                $tipo->save();
                $ct++;
            }
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

        return redirect('/admin/tipopedido')->with('msg_create','Tipo de Pedido criado com sucesso!');
    }
    
    public function edit($id){
        $pedido_id = TipoPedido::findOrFail($id);
        return view('backoffice.tipos.pedidos.edit',['pedido_id'=>$pedido_id]);
    }

    public function update(Request $request){
        $pedido = TipoPedido::findOrFail($request->id);
        if($request->tipoPedido == null || $request->precoBase ==null){
            return back()->with('error','Campo(s) vazio(s)!');
        }
        $pedido->descricao = $request->tipoPedido;
        $pedido->precoBase = $request->precoBase;

        $pedido->save();

        return redirect('/admin/tipopedido')->with('msg_edit', 'Tipo de Pedido alterado com sucesso!');
    }

    public function destroy($id){
        TipoPedido::findOrFail($id)->delete();
        return redirect('/admin/tipopedido')->with('msg_delete', 'Tipo de Pedido - ' . $id . ' - eliminado com sucesso!');
    }
}
