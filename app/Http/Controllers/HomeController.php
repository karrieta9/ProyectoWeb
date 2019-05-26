<?php

namespace App\Http\Controllers;

use App\Orden;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function ventas(Request $request)
    {
        
        $fecha = Orden::whereDate('Fecha', $request->get("fecha"))->where('estado', 'C')->get() ;

        return view('ventas',compact('fecha'));
    }
}
  
