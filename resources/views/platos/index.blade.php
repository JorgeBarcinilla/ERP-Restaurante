@extends('layouts.app')
@section('title')
Ingredientes
@endsection
@section('sidebar')
<button class="btn btn-lite" id="menu-toggle">X</button>
@endsection
@section('content')
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <a href="{{ route('ingredientes.index') }}"
                class="list-group-item list-group-item-action bg-white">Ingredientes</a>
            <a href="{{ route('platos.index') }}" class="list-group-item list-group-item-action bg-white">Platos</a>
        </div>
    </div>
    <button class="btn btn-sidebar" id="menu-toggle">X</button>
    <!-- /#sidebar-wrapper -->
    <div class="container page-content-wrapper">
        <div class="row justify-content-center">
            <h1>PLATOS</h1>
        </div>
        <div class="row justify-content-around">
            <div class="col-sm-12 col-md-10 col-lg-8 card-agregar">
                <div class="card text-center" style="border-radius: 15px; margin-bottom: 25px">
                    <form class="form" method="POST" action="/platos" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header" style="border-radius: 15px">
                            <input class="textFieldDisabled form-control text-center" type="text" value="CREAR PLATO"
                                disabled>
                        </div>
                        <div class="container">
                            <div class="row justify-content-around">
                                <div class="group">
                                    <input class="textField text-center" type="text" name="nombre" maxlength="50"
                                        pattern="[A-Za-z]{2,50}" title="Escribe un nombre valido" required>
                                    <div class="label">Nombre</div>
                                </div>
                                <div class="group">
                                    <input class="textField text-center" type="text" name="valor" maxlength="50"
                                        pattern="[0-9]{1,50}" title="Escriba un valor valido" required>
                                    <div class="label">Valor</div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-around">
                                @foreach ($ingredientes as $ingrediente)
                                <div class="col-6 col-sm-4 col-xl-3 align-items-center">
                                    <div class="group-items">
                                            <input class="check check-crear" type="checkbox" name="CodIngrediente{{$ingrediente->Codigo}}"
                                            id="ch{{$ingrediente->Codigo}}" value="{{$ingrediente->Codigo}}">
                                        {{$ingrediente->Nombre}}
                                        <input class="textFieldDisabled text-center" type="number"
                                            name="cantidad{{$ingrediente->Codigo}}" id="cant{{$ingrediente->Codigo}}"
                                            style="width: 40px" min="1" max="50" title="Escriba un valor entre 1-50" required
                                            disabled>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <input id="input-array-ingredientes" type="hidden" name="ingredientes" value="">
                        </div>
                        <div class="card-footer" style="border-radius: 15px">
                            <input type="submit" class="btn btn-success" id="crear-plato" value="Crear">
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
        <div class="row justify-content-around">
            @foreach ($platos as $plato)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card text-center" style="border-radius: 15px; margin-top: 25px">
                    <form class="form" method="POST" action="/ingredientes/{{$plato->Codigo}}" enctype="multipart/form-data">
                        @method('DELETE')
                        @csrf
                        <div class="card-header" style="border-radius: 15px">
                            <input class="textFieldDisabled textFieldDisabled-js id{{$plato->Codigo}} form-control text-center"
                                id="N{{$plato->Codigo}}" type="text" name="nombre" maxlength="100"
                                pattern="[A-Za-z]{2,100}" title="Escribe un nombre valido" value="{{$plato->Nombre}}"
                                required disabled>
                        </div>
                        <div class="card-body form-group">
                            <label for="" class="col-form-label">Valor:</label>
                            <input class="textFieldDisabled textFieldDisabled-js id{{$plato->Codigo}} form-control text-center"
                                id="P{{$plato->Codigo}}" type="text" name="proveedor" maxlength="100"
                                pattern="[A-Za-z]{2,100}" title="Escribe un nombre valido" value="{{$plato->Valor}}"
                                required disabled>
                        </div>
                        <div class="card-footer" style="border-radius: 15px">
                            <input type="button" id="E{{$plato->Codigo}}" class="btn btn-warning editar" value="Editar">
                            <input type="submit" id="D{{$plato->Codigo}}" class="btn btn-danger eliminar"
                                value="Eliminar">
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
