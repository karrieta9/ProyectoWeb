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

    public function edit(Request $request, $mesa)
    {
        $mesa = Orden::mesa($request->get("mesa"))->paginate();

        return view('cierre',compact('mesa'));
    }

}
