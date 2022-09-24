@extends('layouts.layouts')

@section('title','Contacto')

@section('content')
    <div class="container section">
        <div class="row card-panel">
            <h5>Formulario de contacto:</h5>
            <div class="divider"></div>
            <form action="POST" autocomplete="off">
                @csrf
                <div class="input-field col s12 m6 l6 xl6">
                    <input type="text" id="nombre" name="nombre" class="validate" required>
                    <label for="name">Nombre:</label>
                </div>
                <div class="input-field col s12 m6 l6 xl6">
                    <input type="text" id="apellido" name="apellido" class="validate" required>
                    <label for="apellido">Apellido:</label>
                </div>
                <div class="input-field col s12 m6 m6 l6 xl6">
                    <input type="email" id="email" name="email" class="validate" required>
                    <label for="email">E-mail:</label>
                </div>
                <div class="input-field col s12 m6 m6 l6 xl6">
                    <input type="number" id="fono" name="fono" class="validate" required min="0" minlength="9" maxlength="9">
                    <label for="fono">Fono:</label>
                </div>
                <div class="input-field col s12 m6 m6 m6 l6 xl6">
                    <input type="text" id="asunto" name="asunto" class="validate" required>
                    <label for="Asunto">Asunto:</label>
                </div>
                <div class="input-field col s12 m12 l12 xl12">
                    <textarea id="textarea" name="comentario" class="materialize-textarea"></textarea>
                    <label for="Comentario">Comentario:</label>
                </div>
                <div class="col s12 m6 l6 xl6">
                    <buttton class="btn">Enviar</buttton>
                </div>
            </form>
        </div>
    </div>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            M.AutoInit();/*Para inicializar todo lo de JS*/
        });
    </script>
@endsection
