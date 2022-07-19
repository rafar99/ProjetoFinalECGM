<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactos;
use App\Models\Cliente;


class ContactosController extends Controller
{
    public function index(){

        $contactos = Contactos::all();
        
        // var_dump($cliente);die;
        if(auth()->user()==null){
            return view('frontend/forms/contactos', ['contactos'=>$contactos]);
        }
        $cliente = Cliente::where('utilizador_id',auth()->user()->id)->first();
        return view('frontend/forms/contactos', ['contactos'=>$contactos,'cliente'=>$cliente]);
    }
    


}
