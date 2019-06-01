@extends('common.main')
@section('title')
    Venta
@endsection
@section('main')
<div class="container">
        <div class="row justify-content-center mt-3">
            <h1>LISTA DE VENTAS</h1>
        </div>
        <form action="{{ route('ventas.buscar') }}" method="get">
            <div class="row justify-content-center">
                <div class="group mr-2">
                    <input class="textField text-center" type="date" name="fecha"
                        title="Ingrese una fecha valida" value="" required>
                </div>
                <div class="group ml-2">
                    <input type="submit" class="btn btn-primary btn-submit" value="Buscar">
                </div>
            </div>
        </form>
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
@endsection