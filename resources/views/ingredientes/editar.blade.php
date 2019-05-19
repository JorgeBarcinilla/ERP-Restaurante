@extends('layouts.app')

@section('title','Crear Ingrediente')

@section('content')
<div class="container">
    <form class="form-group" method="POST" action="/ingredientes">
        @csrf
        <div class="row justify-content-around">
            <div class="group">
                <input class="textField" type="text" name="nombre" maxlength="50" pattern="[A-Za-z-0-9- ]{2,50}"
                    title="Escribe un nombre valido" required>
                <div class="label">Nombre del ingrediente</div>
            </div>
            <div class="group">
                <input class="textField" type="text" name="proveedor" maxlength="50" pattern="[A-Za-z- ]{2,50}"
                    title="Escriba un nombre valido" required>
                <div class="label">Proveedor</div>
            </div>
        </div>
        <div class="row justify-content-center form-group">
            <input type="submit" class="btn btn-success" id="enviar" value="Guardar">
        </div>
    </form>
    @endsection