@extends('common.main')
@section('title')
Editar plato
@endsection
@section('main')
<div class="col-sm-12 col-md-10 col-lg-8 card-agregar mt-3 mb-3">
    <div class="card text-center" style="border-radius: 15px; margin-bottom: 25px">
        <form class="form" method="POST" action="/platos/{{$plato->Codigo}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-header" style="border-radius: 15px">
                    <h4 class="text-center">EDITAR PLATO</h4>
            </div>
            <div class="container">
                <div class="row justify-content-around">
                    <div class="group">
                        <input class="textField text-center" type="text" name="nombre" maxlength="50"
                            pattern="[A-Za-z ]{2,50}" title="Escribe un nombre valido" value="{{$plato->Nombre}}"
                            required>
                        <div class="label">Nombre</div>
                    </div>
                    <div class="group">
                        <input class="textField text-center" type="text" name="valor" maxlength="50"
                            pattern="[0-9]{1,50}" title="Escriba un valor valido" value="{{$plato->Valor}}" required>
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

                <input type="submit" class="btn btn-success btn-submit crear-plato" value="Actualizar">
                <a id="C{{$plato->Codigo}}" class="btn btn-danger" href="/platos">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
