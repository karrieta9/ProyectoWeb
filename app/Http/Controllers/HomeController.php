<?php

namespace App\Http\Controllers;

use App\Plato;
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

    public function indexLiquidacion(Request $request)
    {
        //dd($request->get("mesa"));
        $mesa = Orden::mesa($request->get("mesa"))->paginate();

       // dd($mesa);
      // $mesa =Orden::find($request->get("mesa"));

      // dd($mesa);
        return view('liquidacion_cierre',compact('mesa'));
    }

    public function buscarPlatos(Request $request)
    {
       
    $inputs = $request->validate(['mesa' => 'required|numeric|']);

    $platos['platos'] = Plato::all()->sortBy("nombre");
   
    return redirect('liquidacion_cierre');
    }


}
