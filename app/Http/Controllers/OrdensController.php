<?php

namespace App\Http\Controllers;

use App\Orden;
use App\Plato;
use Illuminate\Http\Request;

class OrdensController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $platos['platos'] = Plato::all()->sortBy("nombre");
        $ordenes['ordenes']=Orden::OrderBy('Numero','Desc')->paginate(5);

        $ultimaOrden = Plato::findOrFail(4);

        return view('ordenes', $platos, $ordenes); 
    }

    public function store(Request $request)
    {
        $inputs = $request->validate(['mesa' => 'required|numeric|',
                                      'plato'    => 'required|array|min:1',
                                      'cantidad.*'  => 'required|numeric|max:80']);

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
}
