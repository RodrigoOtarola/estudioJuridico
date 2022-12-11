@extends('layouts.layouts')

@section('title','Crear')

@section('content')
    <div class="container section">
        <div class="row card-panel">
            <h5>Creación de personal:</h5>
            <form action="{{route('team.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Foto</span>
                        <input type="file" name="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="input-field col s12 m6 l6 xl6">
                    <input type="text" id="name" name="name" class="validate" required>
                    <label for="name">Nombre:</label>
                </div>
                <div class="input-field col s12 m6 l6 xl6">
                    <input type="text" id="first_name" name="first_name" class="validate" required>
                    <label for="first_name">Apellido:</label>
                </div>
                <div class="input-field col s12 m12 l12 xl12">
                    <textarea id="description" name="description" class="materialize-textarea"></textarea>
                    <label for="description">Descripción:</label>
                </div>
                <div class="col s12 m6 l6 xl6">
                    <button class="btn blue" type="submit">Guardar</button>
                    <a href="{{route('team.index')}}" class="btn red">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection

