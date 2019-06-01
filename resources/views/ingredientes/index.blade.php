@extends('common.main')
@section('title')
Ingredientes
@endsection
@section('main')
<div class="container">
    <div class="row justify-content-center mt-3">
        <h1 class="text-center">INGREDIENTES</h1>
    </div>
    <div class="row justify-content-around mt-3">
        <div class="col-sm-12 col-md-10 col-lg-8 card-agregar">
            <div class="card text-center" style="border-radius: 15px; margin-bottom: 25px">
                <form class="form" method="POST" action="/ingredientes" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header" style="border-radius: 15px">
                            <h4 class="text-center">AGREGAR INGREDIENTE</h4>
                    </div>
                    <div class="container">
                        <div class="row justify-content-around">
                            <div class="group">
                                <input class="textField text-center" type="text" name="nombre" maxlength="50"
                                    pattern="[A-Za-z ]{2,50}" title="Escribe un nombre valido" required>
                                <div class="label">Ingrediente</div>
                            </div>
                            <div class="group">
                                <input class="textField text-center" type="text" name="proveedor" maxlength="50"
                                    pattern="[A-Za-z ]{2,50}" title="Escriba un nombre valido" required>
                                <div class="label">Proveedor</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="border-radius: 15px">
                        <input type="submit" class="btn btn-success" id="enviar" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        @if (session('status'))
        <div class="alert alert-success col-md-6 text-center">
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>

<div class="container mb-3">
    <div class="row justify-content-around">
        @foreach ($ingredientes as $ingrediente)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card text-center" style="border-radius: 15px; margin-top: 25px">
                <form class="form" method="POST" action="/ingredientes/{{$ingrediente->Codigo}}"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_method" id="flag{{$ingrediente->Codigo}}" value="DELETE">
                    @csrf
                    <div class="card-header" style="border-radius: 15px">
                        <input class="textFieldDisabled id{{$ingrediente->Codigo}} form-control text-center"
                            id="N{{$ingrediente->Codigo}}" type="text" name="nombre" maxlength="100"
                            pattern="[A-Za-z ]{2,100}" title="Escribe un nombre valido"
                            value="{{$ingrediente->Nombre}}" required disabled>
                    </div>
                    <div class="row justify-content-center card-body form-group">
                            <h5 class="text-center col-10">Proveedor</h5>
                        <input class="textFieldDisabled id{{$ingrediente->Codigo}} form-control text-center col-10"
                            id="P{{$ingrediente->Codigo}}" type="text" name="proveedor" maxlength="100"
                            pattern="[A-Za-z ]{2,100}" title="Escribe un nombre valido"
                            value="{{$ingrediente->Proveedor}}" required disabled>
                    </div>
                    <div class="card-footer" style="border-radius: 15px">
                        <div class="container">
                            <div class="row justify-content-around">
                                <input type="button" id="E{{$ingrediente->Codigo}}" class="btn btn-warning editar"
                                    value="Editar">
                                <input type="submit" id="D{{$ingrediente->Codigo}}" class="btn btn-danger eliminar"
                                    value="Eliminar">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
