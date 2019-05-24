<?php

namespace App\Http\Controllers;

use App\Plato;
use App\Ingrediente;
use Illuminate\Http\Request;
use App\PlatoIngrediente; 

class PlatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos['ingredientes']=Ingrediente::orderby('nombre')->paginate();

        //MUESTRA LOS INGREDIENTES QUE PERTENECEN A EL PLATO 2
         $plato = Plato::findOrFail(5);
        // return $plato->ingredientes;

        //MUESTRA LOS PLATOS DONDE ESTA EL INGREDIENTES 2
         $ing = Ingrediente::findOrFail(2);
          //return $ing->platos;

        //return $plato->ingredientes()->attach(5);

       // return $plato->ingredientes()->attach(3 , ['cantidad' => 5]);

      
         //Quitar ingredientes al plato
         //return $plato->ingredientes()->detach(3);

        return view('platos',$datos); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->validate(['nombre' => 'required|string|max:50',
                                      'valor' => 'required|numeric',
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

        

        

      

        
        // //return $usuario = Plato::orderby('codigo','DESC')->take(1)->get();

       
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function show(Plato $plato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function edit(Plato $plato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plato $plato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plato $plato)
    {
        //
    }
}
