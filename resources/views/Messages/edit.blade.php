@extends('layouts.layouts')

@section('title','Ver mensaje')

@section('content')
    <div class="container section">
        <div class="row card-panel">
            <h5>Ver mensaje:</h5>
            <form action="{{route('messages.update', $messages)}}" method="post" autocomplete="off">
                @method('PUT')
                @csrf
                <div class="input-field col s12 m4 l4 xl4">
                    <input type="text" id="name" name="name" class="validate" value="{{$messages->name}}"
                           disabled>
                    <label for="name">Nombre:</label>
                </div>
                <div class="input-field col s12 m4 l4 xl4">
                    <input type="text" id="first_name" name="first_name" class="validate"
                           value="{{$messages->first_name}}" disabled>
                    <label for="first_name">Apellido:</label>
                </div>
                <div class="input-field col s12 m4 l4 xl4">
                    <input type="email" id="email" name="email" class="validate"
                           value="{{$messages->email}}" disabled>
                    <label for="email">E-mail:</label>
                </div>
                <div class="input-field col s12 m4 l4 xl4">
                    <input type="number" id="phone" name="phone" class="validate" min="0" minlength="9"
                           maxlength="9" value="{{$messages->phone}}" disabled>
                    <label for="phone">Fono:</label>
                </div>
                <div class="input-field col s12 m4 l4 xl4">
                    <input type="text" id="subject" name="subject" class="validate"
                           value="{{$messages->subject}}"
                           disabled>
                    <label for="subject">Asunto:</label>
                </div>
                <div class="input-field col s12 m12 l12 xl12">
                    <textarea id="content" name="content" class="materialize-textarea"
                              disabled>{{$messages->content}}</textarea>
                    <label for="content">Comentario:</label>
                </div>
                <div class="input-field col s12 m6 l6 xl6">
                    <select name="estadoTramite_id">
                        <option disabled selected>Selecciona</option>
                        {{--$relacion se trae desde MessagesController--}}
                        @foreach($estadoTramite as $id=>$name)
                            <option value="{{$id}}"
                                    @if($id == $messages->estadoTramite_id) selected @endif >
                                {{$name}}
                            </option>
                        @endforeach
                    </select>
                    <label>Seleccionar estado</label>
                </div>
                <div class="input-field col s12 m8 l8 xl8">
                    <button class="btn-small" type="submit">Enviar</button>
                    <a href="{{route('messages.index')}}" class="btn-small red">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
