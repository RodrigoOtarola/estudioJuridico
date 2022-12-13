@extends('layouts.layouts')

@section('title','Equipo')

@section('content')
    <div class="container section">
        <div class="row card-panel">
            <div class="col s12 m12 l12 xl12">
                <div class="col s6 m6 l6 xl6 black-text left">
                    <h5>Nuestros Profesionales:</h5>
                </div>
                @can('create',$newTeam)
                    <div class="right">
                        <a href="{{route('team.create')}}">
                            <button class="btn blue">Crear</button>
                        </a>
                    </div>
                @endcan

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
                                    {{--Muestra boton editar solo para admin y superadmin--}}
                                    @can('update',$team)
                                        <a href="{{route('team.edit',$team->id)}}" class="btn-small yellow">Editar</a>
                                    @endcan
                                    {{--Muestra boton eliminar solo para admin y superadmin--}}
                                    @can('delete',$team)
                                        <form action="{{route('team.destroy',$team->id)}}" method="post"
                                              style="display:inline" class="confirm-eliminar">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-small red" type="submit">Eliminar</button>
                                        </form>
                                    @endcan
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

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @if(session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Eliminar!',
                'Registro eliminado con exito!',
                'success'
            )
        </script>
    @endif
    <script>
        $('.confirm-eliminar').submit(function (e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Seguro que deseas eliminar?',
                text: "Esta acción es irreversible",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar',
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection
