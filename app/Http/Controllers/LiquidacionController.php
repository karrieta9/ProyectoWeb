<?php

namespace App\Http\Controllers;

use App\Orden;
use Illuminate\Http\Request;

class LiquidacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('liquidacion_cierre');
    }    

    public function show(Request $request)
    {
        $inputs = $request->validate(['mesa' => 'required|numeric']);

        $mesa = Orden::mesa($request->get("mesa"))->get();
        
         if(count($mesa)){
            return view('cierre',compact('mesa'));
         }else{
            return redirect('liquidacion')->with(['Info' =>'No hay una Orden Activa para esa Mesa']);     
         } 
    }

    public function update(Request $request, $numeroOrden)
    {   
        $valorOrden=0;
        
        Orden::where('Numero','=',$numeroOrden)->update(['Estado' => 'C']); 
    
        return redirect('liquidacion')->with('Mensaje','Orden Cerrada Correctamente');

    }

}
