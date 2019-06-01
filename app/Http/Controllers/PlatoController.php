<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plato;
use App\Ingrediente;
use App\PlatoIngrediente;

class PlatoController extends Controller
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
        $ingredientes = Ingrediente::all();
        $platoIngredientes = PlatoIngrediente::all();
        //return $platoIngredientes;
        return view('platos.index',compact('platos','ingredientes','platoIngredientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('platos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ing = explode(",", explode("-",$request->input('ingredientes'))[0]);
        $cant = explode(",", explode("-",$request->input('ingredientes'))[1]);
        $plato = new Plato();
        $plato->Nombre =$request->input('nombre');
        $plato->Valor =$request->input('valor');
        $plato->save();
        for ($i=0; $i < count($ing); $i++) { 
            $plato->ingredientes()->attach($ing[$i],['Cantidad'=>$cant[$i]]);
        }
        $plato->save();
        
        //return $request;
        return redirect()->route('platos.index')->with('status','Plato creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plato $plato)
    {
        $ingredientes = Ingrediente::all();
        $platoIngredientes = PlatoIngrediente::where('codPlato',$plato->Codigo)->get();
        return view('platos.edit',compact('plato','platoIngredientes','ingredientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plato $plato)
    {
        $ing = explode(",", explode("-",$request->input('ingredientes'))[0]);
        $cant = explode(",", explode("-",$request->input('ingredientes'))[1]);
        $plato->Nombre =$request->input('nombre');
        $plato->Valor =$request->input('valor');
        PlatoIngrediente::where('CodPlato',$plato->Codigo)->delete();
        for ($i=0; $i < count($ing); $i++) { 
            $plato->ingredientes()->attach($ing[$i],['Cantidad'=>$cant[$i]]);
        }
        $plato->save();
        return redirect()->route('platos.index')->with('status','Plato actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plato $plato)
    {
        PlatoIngrediente::where('codPlato',$plato->Codigo)->delete();
        $plato->delete();
        return redirect()->route('platos.index')->with('status','Eliminado correctamente');
    }
}
