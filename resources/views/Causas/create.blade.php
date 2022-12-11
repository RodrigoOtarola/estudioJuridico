@extends('layouts.layouts')

@section('title','Crear causa')

@section('content')
    <div class="container section">
        <div class="row card-panel">
            <h5>Creacion de causa:</h5>
            <form action="{{route('causas.store')}}" method="post" autocomplete="off">
                @csrf
                <div class="input-field col s12 m6 l6 xl6">
                    <select name="TypeCause_id">
                        <option disabled selected>Selecciona</option>
                        @foreach($tipoCausas as $id =>$name)
                            <option value="{{$id}}">
                                {{--                                    @if($id == $messages->estadoTramite_id) selected @endif >--}}
                                {{$name}}
                            </option>
                        @endforeach
                    </select>
                    <label>Tipo de causa:</label>
                </div>
                <div class="input-field col s12 m6 l6 xl6">
                    <select name="tribunal_id">
                        <option disabled selected>Selecciona</option>
                        @foreach($tribunales as $tribunal)
                            <option value="{{$tribunal->id}}">
                                {{--                                    @if($id == $messages->estadoTramite_id) selected @endif >--}}
                                {{$tribunal->name}}
                            </option>
                        @endforeach
                    </select>
                    <label>Tribunal:</label>
                </div>
                <div class="input-field col s12 m6 l6 xl6">
                    <select name="user_id[]">
                        <option disabled selected>Selecciona</option>
                        {{--Retornada desde CausasController--}}
                            @foreach($abogados as $id => $name)
                                <option value="{{$id}}">
{{--                                                                        @if($id == $messages->estadoTramite_id) selected @endif >--}}
                                    {{$name}}
                                </option>
                            @endforeach
                    </select>
                    <label>Abogado:</label>
                </div>
                <div class="input-field col s12 m6 l6 xl6">
                    <select name="user_id[]">
                        <option disabled selected>Selecciona</option>
                        Retornada desde CausasController
                            @foreach($clientes as $id => $name)
                                <option value="{{$id}}">
{{--                                                                        @if($id == $messages->estadoTramite_id) selected @endif >--}}
                                    {{$name}}
                                </option>
                            @endforeach
                    </select>
                    <label>Cliente:</label>
                </div>
                <div class="input-field col s12 m12 l12 xl12">
                    <textarea id="description" name="description" class="materialize-textarea"></textarea>
                    <label for="description">Descripción:</label>
                </div>
                <div class="col s12 m6 l6 xl6">
                    <button class="btn blue" type="submit">Guardar</button>
                    <a href="{{route('causas.index')}}" class="btn red">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
