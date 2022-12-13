@extends('layouts.layouts')

@section('title','Comentario')

@section('content')
    <div class="container section">
        <div class="row card-panel">
            <h5>Agregar comentario:</h5>

            <form action="{{route('guardarComentario')}}" method="post">
                @csrf
                {{--                <div class="input-field col s12 m6 l6 xl6">--}}
                {{--                    <select name="estado_causa_id">--}}
                {{--                        <option disabled>Selecciona</option>--}}
                {{--                        @foreach($estadoCausa as $id =>$estado)--}}
                {{--                            <option value="{{$id}}">--}}
                {{--                                --}}{{--                                    @if($id == $messages->estadoTramite_id) selected @endif >--}}
                {{--                                {{$estado}}--}}
                {{--                            </option>--}}
                {{--                        @endforeach--}}
                {{--                    </select>--}}
                {{--                    <label>Estado causa:</label>--}}
                {{--                </div>--}}
                <input type="hidden" value="{{$causa->id}}" name="cause_id">

                <div class="input-field col s12 m12 l12 xl12">
                    <textarea id="description" name="description" class="materialize-textarea"></textarea>
                    <label for="description">Comentario:</label>
                </div>
                <div class="col s12 m12 l12 xl12">
                    <button class="btn blue" type="submit">Guardar</button>
                    <a href="{{route('causas.show',$causa->id)}}" class="btn red">Regresar</a>
                </div>
            </form>

        </div>
    </div>
@endsection
