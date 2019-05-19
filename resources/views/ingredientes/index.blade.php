@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>INGREDIENTES</h1>
    </div>
    <div class="row justify-content-around">
        @foreach ($ingredientes as $ingrediente)
        <div class="col-md-4">
            <div class="card text-center" style="border-radius: 15px; margin-top: 50px">
                <div class="card-header" style="border-radius: 15px">{{$ingrediente->Nombre}}</div>
                <div class="card-body">
                    Proveedor: 
                    <input class="textFieldDisabled id{{$ingrediente->Codigo}}" type="text" name="proveedor" maxlength="100" pattern="[A-Za-z-0-9- ]{2,100}"
                    title="Escribe un nombre valido" value="{{$ingrediente->Proveedor}}" required disabled>
                </div>
                <div class="card-footer" style="border-radius: 15px">
                <a id="{{$ingrediente->Codigo}}" class="btn btn-warning editar">Editar</a>
                    <a href="#" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center" style="margin-top: 50px">
            <a href="/ingredientes/create" class="btn btn-success">Agregar ingrediente</a>
        </div>
</div>

@endsection
