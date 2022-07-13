<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactos;

class ContactosController extends Controller
{
    public function index(){

        $contactos = Contactos::all();

        return view('frontend/forms/contactos', ['contactos'=>$contactos]);
    }
    


}
