<?php

namespace App\Http\Controllers;

use App\Ingrediente;
use Illuminate\Http\Request;

class IngredientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['ingredientes']=Ingrediente::paginate(5);

        return view('ingredients', $datos); 
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
        //$datos = request()->except('_token');
        // Ingrediente::insert($datos);
        // return response()->json($datos);

        $inputs = $request->validate(['nombre' => 'required|string|max:50',
                    'proveedor' => 'required|string|max:50']);

        $msg = "No es Posible Registrar el Ingrediente";
        if ($request->get("nombre")) {
            $nombre = $request->get("nombre");
            $proveedor = $request->get("proveedor");

            if ($nombre != "") {
                try {
                    $ingrediente = new Ingrediente;
                    $ingrediente->nombre = $nombre;
                    $ingrediente->proveedor = $proveedor;
                    $ingrediente->save();
                    $msg='Ingrediente Registrado Correctamente';
                } catch (Exception $e) {
                    $msg = $e->getMessage();
                }
            }
        }
        
        return redirect('ingredients')->with(['Mensaje' => $msg]);            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function show(Ingrediente $ingrediente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $ingrediente = Ingrediente::findOrFail($codigo);

        return view('updateIngrediente',compact('ingrediente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredientes  $ingredientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $codigo)
    {
        $inputs = $request->validate(['nombre' => 'required|string|max:50',
                    'proveedor' => 'required|string|max:50']);
                    
        $datos = request()->except(['_token','_method']);
        Ingrediente::where('codigo','=',$codigo)->update($datos); 

        return redirect('ingredients')->with('Mensaje','Ingrediente Actualizado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingrediente $ingrediente)
    {
        //
    }
}
