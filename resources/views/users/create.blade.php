@extends('layouts.layouts')

@section('title','Crear usuario')

@section('content')
    <div class="container section">
        <div class="card-panel">
            <h5>Crear usuario:</h5>
            <form action="{{route('usuarios.store')}}" method="post" autocomplete="off">
                @include('users.form',['user'=>new App\Models\User()])
                <div class="col s12 m6 l6 xl6">
                    <button class="btn blue" type="submit">Guardar</button>
                    <a href="{{route('usuarios.index')}}" class="btn red">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
