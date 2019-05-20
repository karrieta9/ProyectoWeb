<?php

namespace App\Http\Controllers;

use App\Ingredientes;
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
        $datos['ingredientes']=Ingredientes::paginate(5);
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
        // $datos = request()->all();

        $datos = request()->except('_token');

        Ingredientes::insert($datos);
        return response()->json($datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredientes  $ingredientes
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredientes $ingredientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredientes  $ingredientes
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $ingrediente = Ingredientes::findOrFail($codigo);

        return view('updateIngrediente',compact('ingrediente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredientes  $ingredientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredientes $ingredientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredientes  $ingredientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredientes $ingredientes)
    {
        //
    }
}
