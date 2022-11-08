@extends('layouts.layouts')

@section('title','Contacto')

@section('content')
    <div class="container section">
        <div class="row card-panel">
            <h5>Formulario de contacto:</h5>
            <div class="divider"></div>
            <form action="{{route('messages.store')}}" method="post" autocomplete="off">
                @csrf
                <div class="input-field col s12 m6 l6 xl6">
                    <input type="text" id="name" name="name" class="validate" required>
                    <label for="name">Nombre:</label>
                </div>
                <div class="input-field col s12 m6 l6 xl6">
                    <input type="text" id="first_name" name="first_name" class="validate" required>
                    <label for="first_name">Apellido:</label>
                </div>
                <div class="input-field col s12 m6 m6 l6 xl6">
                    <input type="email" id="email" name="email" class="validate" required>
                    <label for="email">E-mail:</label>
                </div>
                <div class="input-field col s12 m6 m6 l6 xl6">
                    <input type="number" id="phone" name="phone" class="validate" required min="0" minlength="9"
                           maxlength="9">
                    <label for="phone">Fono:</label>
                </div>
                <div class="input-field col s12 m6 m6 m6 l6 xl6">
                    <input type="text" id="subject" name="subject" class="validate" required>
                    <label for="subject">Asunto:</label>
                </div>
                <div class="input-field col s12 m12 l12 xl12">
                    <textarea id="content" name="content" class="materialize-textarea"></textarea>
                    <label for="content">Comentario:</label>
                </div>
                <div class="col s12 m6 l6 xl6">
                    <button class="btn" type="submit">Enviar</button>
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
