@extends('common.main')
@section('title')
Listado de venta
@endsection
@section('main')
<div class="container mb-3 mt-3">
    <div class="row justify-content-center">
        <ul class=" col-10 list-group-item">
        <h2 class="text-center mb-4">VENTAS REALIZADAS EL {{$ordenes[0]->Fecha}}</h2>
            <li class="list-group-item-light">
                <div class="container">
                    <div class="row justify-content-around">
                        <h5 class="text-center col-6">N° ORDEN</h5>
                        <h5 class="text-center col-2">MESA</h5>
                        <h5 class="text-center col-4">VALOR</h5>
                    </div>
                </div>
            </li>
            @for ($i = 0; $i < count($ordenes); $i++)
            <li class="list-group-item">
                    <div class="row justify-content-around">
                    <h5 class="text-center col-6">{{$ordenes[$i]->Numero}}</h5>
                        <h5 class="text-center col-2">{{$ordenes[$i]->NumMesa}}</h5>
                        <h5 class="text-center col-4">${{$valores[$i]}}</h5>
                    </div>
                </li>
            @endfor
            <li class="list-group-item-light">
                <div class="container">
                    <div class="row justify-content-center">
                    <h4 class="mt-3">Total: ${{$totalVenta}}</h4>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="row justify-content-around mt-3">
        <a id="" class="btn btn-danger" href="{{ route('ventas.index') }}">Volver</a>
    </div>
</div>
@endsection