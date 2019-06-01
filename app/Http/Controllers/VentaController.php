<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;
use App\OrdenPlato;

class VentaController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ventas.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buscarVenta(Request $request)
    {
        $ordenes = Orden::where('Fecha',$request->input('fecha'))->where('Estado','C')->get();
        if (count($ordenes) < 1) {
            return redirect()->route('ventas.index')->with('statusFailed','Para el dia seleccionado no se registraron ventas');
        }else{
            $totalVenta = 0;
            $valores = [];
            foreach ($ordenes as $orden) {
                $total = 0;
                $platosOrden = OrdenPlato::where('NumOrden',$orden->Numero)->get();
                foreach ($platosOrden as $platoOrden) {
                    $total += $platoOrden->Valor;
                }
                array_push($valores,$total);
                $totalVenta += $total;
            }

            return view('ventas.buscar',compact('ordenes','valores','totalVenta'));
        }
        
    }
}
