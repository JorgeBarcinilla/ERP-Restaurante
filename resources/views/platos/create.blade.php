@extends('layouts.app')

@section('title','Crear platos')

@section('content')
<div class="container">
        <form class="form-group" method="POST" action="/platos">
                <div class="row justify-content-around">
                        <div class="group">
                            <input class="textField" type="text" name="nombre_grupo" maxlength="50" pattern="[A-Za-z-0-9- ]{2,50}" title="Escribe un nombre valido" required>
                            <div class="label">Nombre del plato</div>
                        </div>
                        <div class="group">
                            <input class="textField" type="text" name="nombre_estudiante" maxlength="100" pattern="[A-Za-z- ]{2,100}" title="Escriba un nombre valido" required>
                            <div class="label">Ingredientes</div>
                        </div>
                        <div class="group">
                            <input class="textField num" type="text" name="codigo_estudiante" maxlength="11" pattern="[0-9]{1,11}" title="Introduce solo de 1 a 11 numeros" required>
                            <div class="label">Precio</div>
                        </div>
                    </div>
                    <div class="row justify-content-center form-group">
                            <input type="submit" class="btn btn-success" id="enviar" value="Crear">
                        </div>
        </form>
@endsection

