@extends('layouts.layouts')

@section('title','Equipo')

@section('content')
    <div class="container section">
        <div class="row card-panel">
            <div class="col s12 m12 l12 xl12">
                <div class="col s6 m6 l6 xl6 black-text left">
                    <h5>Nuestros Profesionales:</h5>
                </div>
                @auth()
                    <div class="right">
                        <a href="{{route('team.create')}}">
                            <button class="btn blue">Crear</button>
                        </a>
                    </div>
                @endauth
            </div>
            <div class="row">
                @forelse($teams as $team)
                    <div class="col s12 m4 l4 xl3">
                        <div class="card medium">
                            <div class="card-image waves-effect waves-light">
                                <img src="/storage/{{$team->image}}" alt="">
                            </div>
                            <div class="card-content">
                            <span class="card-title activator">{{$team->name}} {{$team->first_name}}<i
                                    class="material-icons right">more_vert</i></span>
                                <p><a href="#">Acerca de el..</a></p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Reseña:<i
                                        class="material-icons right">close</i></span>
                                <p>{{$team->description}}.</p>
                            </div>
                            @auth()
                                <div class="card-action">
                                    <a href="{{route('team.edit',$team->id)}}" class="btn-small yellow">Editar</a>
                                    <form action="{{route('team.destroy',$team->id)}}" method="post" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-small red" type="submit">Eliminar</button>
                                    </form>

                                </div>
                            @endauth
                        </div>
                    </div>
                @empty
                    <h5>No hay personal para mostrar.</h5>
                @endforelse
            </div>
        </div>
    </div>
@endsection
