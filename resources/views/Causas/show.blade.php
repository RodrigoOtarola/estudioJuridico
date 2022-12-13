@extends('layouts.layouts')

@section('title','Ver causa')

@section('content')
    <div class="container section">
        <div class="row card-panel">
            <h5>Detalle causa:</h5>
            <div class="input-field col s12 m6 l6 xl6">
                <select name="TypeCause_id">
                    <option disabled>Selecciona</option>
                    @foreach($tipoCausas as $id =>$name)
                        <option value="{{$id}}" disabled
                                {{--                                {{$causas->tipoCausas->pluck('id')->contains($id) ? 'selected' : ''}}>--}}
                                @if($id == $causas->TypeCause_id) selected @endif >
                            {{$name}}
                        </option>
                    @endforeach
                </select>
                <label>Tipo de causa:</label>
            </div>
            <div class="input-field col s12 m6 l6 xl6">
                {{--Llenada desde DDBB--}}
                <select name="tribunal_id">
                    <option disabled selected>Selecciona</option>
                    @foreach($tribunales as $id => $name)
                        <option value="{{$id}}" @if($id == $causas->tribunal->pluck('id')->contains($id) ) selected
                                @endif disabled>{{$name}}</option>
                    @endforeach
                </select>
                <label>Tribunal:</label>
            </div>
            {{--            <div class="input-field col s12 m6 l6 xl6">--}}
            {{--                <select name="user_id[]">--}}
            {{--                    <option disabled selected>Selecciona</option>--}}
            {{--                    --}}{{--Retornada desde CausasController--}}
            {{--                    @foreach($abogados as $id => $name)--}}
            {{--                        <option value="{{$id}}">--}}
            {{--                            --}}{{--                                                                        @if($id == $messages->estadoTramite_id) selected @endif >--}}
            {{--                            {{$name}}--}}
            {{--                        </option>--}}
            {{--                    @endforeach--}}
            {{--                </select>--}}
            {{--                <label>Abogado:</label>--}}
            {{--            </div>--}}
            {{--            <div class="input-field col s12 m6 l6 xl6">--}}
            {{--                <select name="user_id[]">--}}
            {{--                    <option disabled selected>Selecciona</option>--}}
            {{--                    Retornada desde CausasController--}}
            {{--                    @foreach($clientes as $id => $name)--}}
            {{--                        <option value="{{$id}}">--}}
            {{--                            --}}{{--                                                                        @if($id == $messages->estadoTramite_id) selected @endif >--}}
            {{--                            {{$name}}--}}
            {{--                        </option>--}}
            {{--                    @endforeach--}}
            {{--                </select>--}}
            {{--                <label>Cliente:</label>--}}
            {{--            </div>--}}
            <div class="input-field col s12 m12 l12 xl12">
                <textarea id="description" name="description" class="materialize-textarea"
                          disabled>{{$causas->description}}</textarea>
                <label for="description">Descripción:</label>
            </div>
            <h4>Bitacora</h4>
            @auth()
                {{--{{route('causas.create')}}--}}
                <div class="col s12 m12 l12 xl12">
                    <a href="{{route('crearComentario',$causas->id)}}">
                        <button class="btn yellow">Agregar comentario</button>
                    </a>
                </div>
            @endauth
            <br>
            <div class="col s12 m12 l12 xl12">
                <ul class="collection">
                    @foreach($comentarios as $comentario)
                        <li class="collection-item">
                            <span>{{$comentario->created_at->format('d/m/Y h:s')}}</span>
                            <br>
                            {{$comentario->description}}
                        </li>
                    @endforeach
                </ul>
            </div>
            <br>
            <div class="col s12 m6 l6 xl6">
{{--                <button class="btn blue" type="submit">Pendiente</button>--}}
                <a href="{{route('causas.index')}}" class="btn red">Regresar</a>
            </div>


        </div>
    </div>

@endsection
