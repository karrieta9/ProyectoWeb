<?php

namespace App\Http\Controllers;

use App\Orden;
use App\Plato;
use Illuminate\Http\Request;

class OrdensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platos['platos'] = Plato::all()->sortBy("nombre");
        $ordenes['ordenes']=Orden::paginate(5);

        ///$ultimaOrden = Orden::all()->last();
        $ultimaOrden = Plato::findOrFail(4);
       // return $ultimaOrden->ordenes;

        // $platos = $request->get("plato");
        //     $cantidad = $request->get("cantidad");

        //$ultimaOrden->ingredientes()->attach($ingrediente[$i] , ['cantidad' => $cantidad[$i]]);

        return view('ordenes', $platos, $ordenes); 
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
        $inputs = $request->validate(['mesa' => 'required|numeric|',
                                      'plato'    => 'required|array|min:1',
                                      'cantidad.*'  => 'required|numeric',]);

        $buscar = \DB::table('ordens')->where('estado','N')->where('mesa', $request->get("mesa"))->get();

        if(count($buscar)){
            $msg='Ya Existe una Orden Activa para esta Mesa';
        }else{
            $msg = "No es Posible Registrar la Orden";
            if ($request->get("mesa")) {
                $mesa = $request->get("mesa");
                $platos = $request->get("plato");
                $cantidad = $request->get("cantidad");
                    if ($mesa != "") {
                        try {
                            $orden = new Orden;
                            $orden->Mesa = $mesa;
                            $orden->save();
                                for ($i=0; $i < count($platos) ; $i++) {
                                    $ultimaOrden = Orden::all()->last();
                                    Plato::findOrFail($platos[$i])['valor'];
            
                                    $ultimaOrden->platos()->attach($platos[$i], [ 'Valor' => ($cantidad[$i] * Plato::findOrFail($platos[$i])['valor']) , 'cantidad' => $cantidad[$i] ] );
                                }
                            $msg='Orden Registrada Correctamente';
                        } catch (Exception $e) {
                            $msg = $e->getMessage();
                        }
                    }
            }
        }
      
      return redirect('ordenes')->with(['Mensaje' => $msg]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function show(Orden $orden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit(Orden $orden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orden $orden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orden $orden)
    {
        //
    }
}
