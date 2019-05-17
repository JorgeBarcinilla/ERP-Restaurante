@extends('layouts.app')

@section('title','Crear platos')

@section('content')
<div class="container">
        <div class="form-group">
                <div class="row justify-content-around">
                        <div class="group">
                            <input class="textField num" type="text"  name="codigo_grupo"  maxlength="11" pattern="[0-9]{1,11}" title="Introduce solo de 1 a 11 numeros" required>
                            <div class="label">Codigo del grupo</div>
                        </div>
                        <div class="group">
                            <input class="textField" type="text" name="nombre_grupo" maxlength="50" pattern="[A-Za-z-0-9- ]{2,50}" title="Escribe un nombre valido" required>
                            <div class="label">Nombre del grupo</div>
                        </div>
                        <div class="group">
                            <input class="textField num" type="text" name="codigo_estudiante" maxlength="11" pattern="[0-9]{1,11}" title="Introduce solo de 1 a 11 numeros" required>
                            <div class="label">Su Codigo</div>
                        </div>
                        <div class="group">
                            <input class="textField" type="text" name="nombre_estudiante" maxlength="100" pattern="[A-Za-z- ]{2,100}" title="Escriba un nombre valido" required>
                            <div class="label">Su Nombre</div>
                        </div>
                        <div class="group">
                            <input class="textField" type="text" name="direccion" maxlength="100" pattern="[A-Za-z-0-9- #-]{2,100}" title="Escriba una direccion valida" required>
                            <div class="label">Direeccion</div>
                        </div>
                        <div class="group">
                            <input class="textField" type="email" name="email" maxlength="100" required>
                            <div class="label">Email</div>
                        </div>
                        <div class="group">
                            <input class="textField num" type="text" name="celular" maxlength="11" pattern="[0-9]{7,11}" title="Digite un numero de telefono valido" required>
                            <div class="label">Numero celular</div>
                        </div>
                    </div>
                    <div class="row justify-content-center form-group">
                            <input type="submit" class="btn btn-success" id="enviar" value="Enviar">
                        </div>
        </div>
@endsection

