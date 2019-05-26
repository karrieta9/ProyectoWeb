<?php

namespace App\Http\Controllers;

use App\Orden;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function ventas(Request $request)
    {
        $fecha = Orden::whereDate('Fecha', $request->get("fecha"))->where('estado', 'C')->get() ;

       // return $fecha;
        return view('ventas',compact('fecha'));
    }


}
  
