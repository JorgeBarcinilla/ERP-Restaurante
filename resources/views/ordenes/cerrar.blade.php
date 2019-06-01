@extends('common.main')
@section('title')
Cerrar orden
@endsection
@section('main')
<div class="container mb-3 mt-3">
    <div class="row justify-content-center">
        <ul class=" col-10 list-group-item">
                    <h2 class="text-center mb-4">Orden {{$orden->Numero}} - Mesa {{$orden->NumMesa}}</h2>
            <li class="list-group-item-light">
                <div class="container">
                    <div class="row justify-content-around">
                        <h5 class="text-center col-6">PLATO</h5>
                        <h5 class="text-center col-2">CANTIDAD</h5>
                        <h5 class="text-center col-4">VALOR</h5>
                    </div>
                </div>
            </li>
            @foreach ($platosOrden as $platoOrden)
            @foreach ($platos as $plato)
            @if($platoOrden->CodPlato == $plato->Codigo)
                <li class="list-group-item">
                    <div class="row justify-content-around">
                    <h5 class="text-center col-6">{{$plato->Nombre}}</h5>
                        <h5 class="text-center col-2">{{$platoOrden->Cantidad}}</h5>
                        <h5 class="text-center col-4">${{$platoOrden->Valor}}</h5>
                    </div>
                </li>
            @endif
            @endforeach
            @endforeach
            <li class="list-group-item-light">
                <div class="container">
                    <div class="row justify-content-center">
                    <h4 class="mt-3">Total: ${{$total}}</h4>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="row justify-content-around mt-3">
        <a id="" class="btn btn-danger" href="/ordenes/buscar">Cancelar</a>
        <form action="{{route('ordenes.updateEstado')}}" method="post">
            @csrf
            <input type="hidden" name="orden" value="{{$orden->Numero}}">
            <input type="submit" class="btn btn-success btn-submit" value="Cerrar orden">
        </form>
        
    </div>
</div>
@endsection
