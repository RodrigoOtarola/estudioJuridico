@extends('layouts.layouts')

@section('title','Crear noticia')

@section('content')

    <div class="container section">
        <div class="card-panel">
            <h5>Crear noticia:</h5>
            <form action="{{route('noticias.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Foto</span>
                        <input type="file" name="img">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="input-field col s12 m6 l6 xl6">
                    <input type="text" id="title" name="title" class="validate" required>
                    <label for="title">Título:</label>
                </div>
                <div class="input-field col s12 m12 l12 xl12">
                    <textarea id="content" name="content" class="materialize-textarea"></textarea>
                    <label for="content">Contenido: </label>
                </div>
                <div class="col s12 m6 l6 xl6">
                    <button class="btn blue" type="submit">Guardar</button>
                    <a href="{{route('listarNoticias')}}" class="btn red">Regresar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
