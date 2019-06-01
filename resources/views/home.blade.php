@extends('layouts.app')

@section('content')
<header id="welcome">
    <div class="container">
        <div class="text">
            <div class="intro-heading">Bienvenido a tu espacio para administrar mejor tu restaurante.</div>
            <div class="intro-heading">Comienza a personalizar tu carta es cualquiera de estas opciones.</div>
            <a class="btn btn-outline-dark btn-xl text-uppercase ml-2 mr-2" href="{{ route('ingredientes.index') }}">INGREDIENTES</a>
            <a class="btn btn-outline-dark btn-xl text-uppercase ml-2 mr-2" href="{{ route('platos.index') }}">PLATOS</a>
            <a class="btn btn-outline-dark btn-xl text-uppercase ml-2 mr-2" href="{{ route('ordenes.index') }}">ORDENES</a>
            <a class="btn btn-outline-dark btn-xl text-uppercase ml-2 mr-2" href="{{ route('ventas.index') }}">VENTAS</a>
        </div>
    </div>
</header>
@endsection
