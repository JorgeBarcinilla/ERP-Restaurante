@extends('common.main')
@section('title')
Ordenes
@endsection
@section('main')
<div class="container">
    <div class="row justify-content-center mt-3">
        <h1>ORDENES</h1>
    </div>
    <div class="row justify-content-center mt-3">
        <a href="{{ route('ordenes.create') }}" class="btn btn-success btn-lg">Nueva orden</a>
    </div>
    <div class="row justify-content-center mt-3">
        @if (session('statusSuccess'))
        <div class="alert alert-success col-md-6 text-center">
            {{ session('statusSuccess') }}
        </div>
        @endif
        @if (session('statusFailed'))
        <div class="alert alert-danger col-md-6 text-center">
            {{ session('statusFailed') }}
        </div>
        @endif
    </div>
</div>
<div class="container mb-3">
    <div class="row justify-content-around">
        @foreach ($ordenes as $orden)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card text-center" style="border-radius: 15px; margin-top: 25px">
                <form class="form" method="POST" action="/platos/{{$orden->Numero}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header" style="border-radius: 15px">
                        <h4 class="text-center">Mesa {{$orden->NumMesa}}</h4>
                    </div>
                    <div class="container">

                        <div class="row justify-content-center">
                            Platos
                        </div>
                        <div class="container container-ingredientes">
                            <div class="row justify-content-around">
                                @foreach ($ordenesPlato as $ordenPlato)
                                @if ($ordenPlato->NumOrden == $orden->Numero)
                                <div class="col-12 align-items-center">
                                    <div class="group-items">
                                        @foreach ($platos as $plato)
                                        @if ($plato->Codigo == $ordenPlato->CodPlato)
                                        {{$plato->Nombre}}
                                        <input class="textFieldDisabled text-center id{{$orden->Numero}}" type="number"
                                            name="cantidad{{$ordenPlato->Id}}" id="cant{{$ordenPlato->Id}}"
                                            style="width: 40px" min="1" title="Escriba un valor mayor a 0"
                                            value="{{$ordenPlato->Cantidad}}" required disabled>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <input id="input-array-ingredientes" type="hidden" name="ingredientes" value="">
                        </div>
                        <div class="row justify-content-around">
                            <label for="" class="col-10">Valor total</label>
                            <input class="textFieldDisabled  id{{$orden->Numero}} form-control text-center col-10"
                                id="V{{$orden->Numero}}" type="text" name="valor" maxlength="100"
                                pattern="[A-Za-z]{2,100}" title="Escribe un nombre valido" value="<?php 
                                                    
                                                    $total = 0;
            
                                                    foreach ($ordenesPlato as $ordenPlato) {
                                                        if($ordenPlato->NumOrden == $orden->Numero){
                                                            $total += $ordenPlato->Valor;
                                                        }
                                                    }
                                                    echo $total; 
                                                    
                                                    ?>" required disabled>
                        </div>
                        <div class="row justify-content-around mt-2">
                            <label for="" class="col-10">Estado</label>
                            <h3 class="col-10">
                                {{$orden->Estado}}
                            </h3>
                        </div>
                    </div>
                </form>
                <div class="card-footer" style="border-radius: 15px">
                    @if ($orden->Estado == "N")
                    <a id="E{{$orden->Numero}}" class="btn btn-warning"
                        href="/ordenes/{{$orden->Numero}}/edit">Editar</a>
                    <form action="{{ route('ordenes.cerrar') }}" method="get">
                        <input type="hidden" name="mesa" value="{{$orden->NumMesa}}">
                        <input type="submit" class="btn btn-success" value="Cerrar orden">
                    </form>
                    @else
                    <h4 class="text-center">Orden cerrada</h4>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
