@extends('layouts.layouts')

@section('title','Editar noticia')

@section('content')
    <div class="container section">
        <div class="card-panel">
            <h5>Editar noticias:</h5>
            <form action="{{route('noticias.update',$news->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="file-field input-field">
                    <div class="file-path-wrapper">
                        <img src="/storage/{{$news->img}}" alt=""/>
                    </div>
                </div>
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
                    <input type="text" id="title" name="title" class="validate" required value="{{old('title',$news->title)}}">
                    <label for="title">Título:</label>
                </div>
                <div class="input-field col s12 m12 l12 xl12">
                    <textarea id="content" name="content" class="materialize-textarea">{{old('content',$news->content)}}</textarea>
                    <label for="content">Contenido: </label>
                </div>
                <div class="col s12 m6 l6 xl6">
                    <button class="btn blue" type="submit">Actualizar</button>
                    <a href="{{route('listarNoticias')}}" class="btn red">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
