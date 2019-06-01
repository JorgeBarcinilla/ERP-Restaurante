@extends('common.main')
@section('title')
Platos
@endsection
@section('main')
<div class="container">
    <div class="row justify-content-center mt-3">
        <h1>PLATOS</h1>
    </div>
    <div class="row justify-content-around mt-3">
        <div class="col-sm-12 col-md-10 col-lg-8 card-agregar">
            <div class="card text-center" style="border-radius: 15px; margin-bottom: 25px">
                <form class="form" method="POST" action="/platos" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header" style="border-radius: 15px">
                            <h4 class="text-center">CREAR PLATO</h4>
                    </div>
                    <div class="container">
                        <div class="row justify-content-around">
                            <div class="group">
                                <input class="textField text-center" type="text" name="nombre" maxlength="50"
                                    pattern="[A-Za-z ]{2,50}" title="Escribe un nombre valido" required>
                                <div class="label">Nombre</div>
                            </div>
                            <div class="group">
                                <input class="textField text-center" type="text" name="valor" maxlength="50"
                                    pattern="[0-9]{1,50}" title="Escriba un valor valido" required>
                                <div class="label">Valor</div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                                <h5 class="text-center">Ingredientes</h5>
                        </div>
                        <div class="container container-ingredientes">
                            <div class="row justify-content-around">
                                @foreach ($ingredientes as $ingrediente)
                                <div class="col-6 col-sm-4 col-xl-3 align-items-center">
                                    <div class="group-items">
                                        <input class="check check-crear" type="checkbox"
                                            name="CodIngrediente{{$ingrediente->Codigo}}" id="ch{{$ingrediente->Codigo}}"
                                            value="{{$ingrediente->Codigo}}">
                                        {{$ingrediente->Nombre}}
                                        <input class="textFieldDisabled text-center" type="number"
                                            name="cantidad{{$ingrediente->Codigo}}" id="cant{{$ingrediente->Codigo}}"
                                            style="width: 40px" min="1" max="50" title="Escriba un valor entre 1-50"
                                            required disabled>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <input id="input-array-ingredientes" type="hidden" name="ingredientes" value="">
                        </div>
                    </div>
    
                    <div class="card-footer" style="border-radius: 15px">
                        <input type="submit" class="btn btn-success btn-submit crear-plato" value="Crear">
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
        @foreach ($platos as $plato)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card text-center" style="border-radius: 15px; margin-top: 25px">
                <form class="form" method="POST" action="/platos/{{$plato->Codigo}}" enctype="multipart/form-data">
                    @method('DELETE')
                    @csrf
                    <div class="card-header" style="border-radius: 15px">
                            <h4 class="text-center">{{$plato->Nombre}}</h4>
                    </div>
                    <div class="container">
                        <div class="row justify-content-around mt-1">
                                <h5 class="text-center col-10">Valor</h5>
                            <input class="textFieldDisabled  id{{$plato->Codigo}} form-control text-center col-10"
                                id="V{{$plato->Codigo}}" type="text" name="valor" maxlength="100" pattern="[0-9]{1,100}"
                                title="Escribe un nombre valido" value="{{$plato->Valor}}" required disabled>
                        </div>
                        <div class="row justify-content-center">
                                <h5 class="text-center">Ingredientes</h5>
                        </div>
                        <div class="container container-ingredientes">
                            <div class="row justify-content-around">
                                @foreach ($platoIngredientes as $platoIngrediente)
                                @if ($plato->Codigo == $platoIngrediente->CodPlato)
                                <div class="col-12 align-items-center">
                                    <div class="group-items">
                                        @foreach ($ingredientes as $ingrediente)
                                        @if ($ingrediente->Codigo == $platoIngrediente->CodIngrediente)
                                        <input class="check check-crear id{{$plato->Codigo}}" type="checkbox"
                                            name="CodIngrediente{{$platoIngrediente->Id}}"
                                            id="ch{{$platoIngrediente->Id}}" value="{{$ingrediente->Codigo}}" checked
                                            disabled>
                                        {{$ingrediente->Nombre}}
                                        <input class="textFieldDisabled text-center id{{$plato->Codigo}}" type="number"
                                            name="cantidad{{$platoIngrediente->Id}}" id="cant{{$platoIngrediente->Id}}"
                                            style="width: 40px" min="1" title="Escriba un valor mayor a 0"
                                            value="{{$platoIngrediente->Cantidad}}" required disabled>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                @endforeach
                            </div>
                            <input id="input-array-ingredientes" type="hidden" name="ingredientes" value="">
                        </div>
                    </div>
                    <div class="card-footer" style="border-radius: 15px">
                        <a id="E{{$plato->Codigo}}" class="btn btn-warning"
                            href="/platos/{{$plato->Codigo}}/edit">Editar</a>
                        <input type="submit" id="D{{$plato->Codigo}}" class="btn btn-danger eliminar" value="Eliminar">
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
