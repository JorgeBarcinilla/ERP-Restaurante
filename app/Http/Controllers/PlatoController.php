<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plato;
use App\Ingrediente;
use App\PlatoIngrediente;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platos = Plato::all();
        $ingredientes = Ingrediente::all();
        return view('platos.index',compact('platos','ingredientes'));
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
        foreach ($request as $key => $value) {
            
            if(strpos($key,'CodIngrediente')){
                $platoIngrediente = new PlatoIngrediente();
                $platoIngrediente->CodPlato = $plato->Codigo;
                $platoIngrediente->CodIngrediente = $request->input($key);
                $platoIngrediente->Cantidad = $request->input('Cantidad'.$value);
            }
        }
        //return $request;
        return redirect()->route('platos.index')->with('status','Plato creado correctamente');
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
}
