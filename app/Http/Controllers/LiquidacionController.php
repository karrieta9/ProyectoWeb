<?php

namespace App\Http\Controllers;

use App\Orden;
use Illuminate\Http\Request;

class LiquidacionController extends Controller
{
    public function index()
    {
        return view('liquidacion_cierre');
    }    

    public function show(Request $request)
    {
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
        $ordens = Orden::findOrFail($numeroOrden);
       
        for ($i=0; $i < count($ordens->platos) ; $i++) { 
             $valorOrden += $ordens->platos[$i]['pivot']['Valor'];
        }

        return redirect('liquidacion/cierre')->with('Mensaje','Orden Cerrada Correctamente')->with('Valor',$valorOrden);

    }

}
