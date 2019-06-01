<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plato;
use Carbon\Carbon;
use App\Orden;
use App\OrdenPlato;

class OrdenController extends Controller
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
        $platos = Plato::all();
        $ordenes = Orden::all();
        $ordenesPlato = OrdenPlato::all();
        return view('ordenes.index',compact('ordenes','ordenesPlato','platos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $platos = Plato::all();
        return view('ordenes.create',compact('platos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regs = Orden::where('NumMesa',$request->input('mesa'))->get();
        $flag = false;

        foreach ($regs as $reg) {
            if($reg->Estado == 'N'){
                $flag = true;
                break;
            }
        }

        if($flag){
            return redirect()->route('ordenes.index')->with('statusFailed','Actualmente la mesa '.$request->input('mesa').' tiene una orden activa');
        }else{
            $pla = explode(",", explode("-",$request->input('platos'))[0]);
            $cant = explode(",", explode("-",$request->input('platos'))[1]);
            $valor = explode(",", explode("-",$request->input('platos'))[2]);
            $orden = new Orden();
            $orden->NumMesa =$request->input('mesa');
            $orden->Estado = "N";
            $orden->Fecha = Carbon::now()->toDateTimeString();
            $orden->save();
            for ($i=0; $i < count($pla); $i++) { 
                $orden->platos()->attach($pla[$i],['Cantidad'=>$cant[$i],'Valor'=>$valor[$i]]);
            }
            $orden->save();
            return redirect()->route('ordenes.index')->with('statusSuccess','Orden creada correctamente');
        }

        
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
    public function edit(Orden $ordene)
    {

        $platos = Plato::all();
        $ordenesPlato = OrdenPlato::where('NumOrden',$ordene->Numero)->get();
        return view('ordenes.edit',compact('ordene','platos','ordenesPlato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orden $ordene)
    {
        $pla = explode(",", explode("-",$request->input('platos'))[0]);
        $cant = explode(",", explode("-",$request->input('platos'))[1]);
        $valor = explode(",", explode("-",$request->input('platos'))[2]);
        OrdenPlato::where('NumOrden',$ordene->Numero)->delete();
        for ($i=0; $i < count($pla); $i++) { 
            $ordene->platos()->attach($pla[$i],['Cantidad'=>$cant[$i],'Valor'=>$valor[$i]]);
        }
        $ordene->save();
        return redirect()->route('ordenes.index')->with('statusSuccess','Orden actualizada correctamente');
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
    public function buscarOrden()
    {
        return view('ordenes.buscar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cerrarOrden(Request $request)
    {
        $orden = Orden::where('NumMesa',$request->input('mesa'))->where('Estado','N')->first();
        if ($orden == "") {
            return redirect()->route('ordenes.buscar')->with('statusFailed','La mesa '.$request->input('mesa').' no tiene orden activa');
        }else{
            $platosOrden = OrdenPlato::where('NumOrden',$orden->Numero)->get();
            $total = 0;
            foreach ($platosOrden as $platoOrden) {
                $total += $platoOrden->Valor;
            }
            $platos = Plato::all();
            return view('ordenes.cerrar',compact('orden','platosOrden','platos','total'));
        }
        
    }
    
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEstado(Request $request)
    {
        $orden = Orden::find($request->input('orden'));
        $orden->Estado = "C";
        $orden->save();
        return redirect()->route('ordenes.buscar')->with('statusSuccess','Se ha cerrado correctamente la orden de la mesa '.$orden->NumMesa);
    }

}
