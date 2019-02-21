<?php

namespace App\Http\Controllers;

use App\Pagina;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        $tratamientos = Pagina::where('categoria_id',1);
        $productos = Pagina::where('categoria_id',2);
        $servicios = Pagina::where('categoria_id',3);

        return view('web',compact('tratamientos','productos','servicios'));
    }

    public function show($id){
        $pagina = Pagina::find($id);
        $tratamientos = Pagina::where('categoria_id',1)->get();
        $productos = Pagina::where('categoria_id',2);
        $servicios = Pagina::where('categoria_id',3);
        return view('web.show',compact('pagina','tratamientos','productos','servicios'));
    }
}
