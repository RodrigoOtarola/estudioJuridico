@extends('layouts.layouts')

@section('title','Crear causa')

@section('content')
    <div class="container section">
        <div class="row card-panel">
            <h5>Creacion de causa:</h5>
            <form action="{{route('causas.store')}}" method="post" autocomplete="off">
                @include('Causas._form',['causa'=>new App\Models\Causes()])
                <div class="col s12 m6 l6 xl6">
                    <button class="btn blue" type="submit">Guardar</button>
                    <a href="{{route('causas.index')}}" class="btn red">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
