<?php

namespace App\Http\Controllers;

use App\Plato;
use App\Ingrediente;
use Illuminate\Http\Request;

class PlatosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
                                      'cantidad.*'  => 'required|numeric|max:80']);

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

    public function edit($codigo)
    {
        $plato = Plato::findOrFail($codigo);

        return view('updatePlato',compact('plato'));
    }

    public function update(Request $request, $codigo)
    {
        $inputs = $request->validate(['nombre' => 'required|string|max:50',
                                        'valor' => 'required|numeric|max:100000']);
                    
        $datos = request()->except(['_token','_method']);
        Plato::where('codigo','=',$codigo)->update($datos); 

        return redirect('platos')->with('Mensaje','Plato Actualizado Correctamente');

    }
}
