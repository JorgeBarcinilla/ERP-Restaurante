@extends('common.main')
@section('title')
Editar orden
@endsection
@section('main')
<div class="col-10 card-agregar mt-3 mb-3">
    <div class="card text-center" style="border-radius: 15px; margin-bottom: 25px">
        <form class="form" method="POST" action="/ordenes/{{$ordene->Numero}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-header" style="border-radius: 15px">
                    <h4 class="text-center">EDITAR ORDEN</h4>
            </div>
            <div class="container">
                <div class="row justify-content-around">
                    <h2 class="col-10 mt-3">
                        Mesa {{$ordene->NumMesa}}
                    </h2>
                </div>
                <div class="row justify-content-center">
                        <h5 class="text-center">Platos</h5>
                </div>
                <div class="container container-platos">
                    <div class="row justify-content-around">
                            @foreach ($platos as $plato)
                            <div class="col-md-6 col-lg-4 col-xl-3 mb-4 ">
                                <div class="card text-center plato-orden" id="cardPlato{{$plato->Codigo}}"
                                    style="border-radius: 15px; margin-top: 25px">
                                    <input class="check-plato-orden" type="hidden" id="check{{$plato->Codigo}}"
                                        value="false">
                                        <div class="card-header" style="border-radius: 15px">
                                            <input class="textFieldDisabled id{{$plato->Codigo}} form-control text-center"
                                                id="N{{$plato->Codigo}}" type="text" name="nombre" maxlength="100"
                                                pattern="[A-Za-z ]{2,100}" title="Escribe un nombre valido"
                                                value="{{$plato->Nombre}}" required disabled>
                                        </div>
                                    <div class="row justify-content-center card-body form-group">
                                            <h5 class="text-center col-10">Valor</h5>
                                        <input class="textFieldDisabled id{{$plato->Codigo}} form-control text-center"
                                            id="V{{$plato->Codigo}}" type="text" name="proveedor" maxlength="100"
                                            pattern="[A-Za-z]{2,100}" title="Escribe un nombre valido"
                                            value="{{$plato->Valor}}" required disabled>
                                    </div>
                                    <div class="card-footer" style="border-radius: 15px">
                                        <div class="container">
                                            <div class="row justify-content-around">
                                                <label for="" class="col-form-label">Cantidad</label>
                                                <input
                                                    class="textFieldDisabled-cantOrden text-center id{{$plato->Codigo}} cantidad-orden"
                                                    type="number" name="cantidad" id="cantidad{{$plato->Codigo}}"
                                                    style="width: 40px" min="1" title="Escriba un valor mayor a 0" value=""
                                                    required disabled>
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                    <input id="input-array-platos" type="hidden" name="platos" value="">
                </div>
            </div>

            <div class="card-footer" style="border-radius: 15px">
                <input type="submit" class="btn btn-success btn-submit crear-orden" value="Actualizar">
                <a id="C{{$ordene->Codigo}}" class="btn btn-danger" href="/ordenes">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
