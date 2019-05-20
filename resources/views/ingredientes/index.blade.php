@extends('layouts.app')
@section('title')
Ingredientes
@endsection

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <h1>INGREDIENTES</h1>
    </div>
    <div class="row justify-content-center">
            @if (session('status'))
            <div class="alert alert-success col-md-6 text-center">
                {{ session('status') }}
            </div>
            @endif
        </div>
    <div class="row justify-content-around">
        @foreach ($ingredientes as $ingrediente)
        <div class="col-md-4">
            <div class="card text-center" style="border-radius: 15px; margin-top: 50px">
                <form method="POST" action="/ingredientes/{{$ingrediente->Codigo}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-header" style="border-radius: 15px">
                        <input class="textFieldDisabled id{{$ingrediente->Codigo}} form-control text-center"
                            id="N{{$ingrediente->Codigo}}" type="text" name="nombre" maxlength="100"
                            pattern="[A-Za-z]{2,100}" title="Escribe un nombre valido" value="{{$ingrediente->Nombre}}"
                            required disabled>
                    </div>
                    <div class="card-body form-group">
                        <label for="" class="col-form-label">Proveedor:</label>
                        <input class="textFieldDisabled id{{$ingrediente->Codigo}} form-control text-center"
                            id="P{{$ingrediente->Codigo}}" type="text" name="proveedor" maxlength="100"
                            pattern="[A-Za-z]{2,100}" title="Escribe un nombre valido"
                            value="{{$ingrediente->Proveedor}}" required disabled>
                    </div>
                    <div class="card-footer" style="border-radius: 15px">
                        <input type="button" id="E{{$ingrediente->Codigo}}" class="btn btn-warning editar"
                            value="Editar">
                        <input type="button" id="D{{$ingrediente->Codigo}}" class="btn btn-danger eliminar"
                            value="Eliminar">
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center" style="margin-top: 50px">
        <a href="/ingredientes/create" class="btn btn-success">Agregar ingrediente</a>
    </div>
</div>

@endsection
