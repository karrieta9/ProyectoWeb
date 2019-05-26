<?php

namespace App\Http\Controllers;

use App\Plato;
use App\Ingrediente;
use Illuminate\Http\Request;

class PlatosController extends Controller
{
    public function index(){
        $datos['ingredientes'] = Ingrediente::all()->sortBy("nombre");
        $platos['platos'] = Plato::paginate(5);

        return view('platos', $datos, $platos); 
    }

    public function store(Request $request)
    {
        $inputs = $request->validate(['nombre' => 'required|string|max:50',
                                      'valor' => 'required|numeric|max:100000',
                                      'ingrediente'    => 'required|array|min:1',
                                      'cantidad.*'  => 'required|numeric',]);

        $msg = "No es Posible Registrar el Plato";
        if ($request->get("nombre")) {
            $nombre = $request->get("nombre");
            $valor = $request->get("valor");
            $ingrediente = $request->get("ingrediente");
            $cantidad = $request->get("cantidad");

            if ($nombre != "") {
                try {
                    $plato = new Plato;
                    $plato->nombre = $nombre;
                    $plato->valor = $valor;
                    $plato->save();
                    for ($i=0; $i < count($ingrediente) ; $i++) {
                        $ultimoPlato = Plato::all()->last();
                        $ultimoPlato->ingredientes()->attach($ingrediente[$i] , ['cantidad' => $cantidad[$i]]);
                    }
                    $msg='Plato Registrado Correctamente';
                } catch (Exception $e) {
                    $msg = $e->getMessage();
                }
            }
        }
      
       return redirect('platos')->with(['Mensaje' => $msg]); 
    }
}
