@extends('layouts.layouts')

@section('title','Editar usuario')

@section('content')
    <div class="container section">
        <div class="card-panel">
            <h5>Editar usuario:</h5>
            <form action="{{route('usuarios.update',$user->id)}}" method="post" autocomplete="off">
                @method('PUT')

                {{--Incluir layout de form--}}
                @include('users.form')
                <div class="col s12 m6 l6 xl6">
                    <button class="btn blue" type="submit">Guardar</button>
                    <a href="{{route('usuarios.index')}}" class="btn red">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
