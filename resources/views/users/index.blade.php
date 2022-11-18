@extends('layouts.layouts')

@section('title','Usuarios')

@section('content')

    {{--    {{dd(auth()->user()->roles->toArray())}}--}}
    <div class="container section">
        <div class="row card-panel">
            <div class="col s12 m12 l12 xl12">
                <div class="col s6 m6 l6 xl6 black-text left">
                    <h5>Usuarios:</h5>
                </div>
                @auth()
                    <div class="right">
                        <a href="{{route('usuarios.create')}}">
                            <button class="btn blue">Crear usuario</button>
                        </a>
                    </div>
                @endauth
            </div>
            <table class="responsive-table striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>Fono</th>
                    <th>Perfil</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                            {{--arrays de roles, implode es el separador--}}
                            {{$user->roles->pluck('display_name')->implode(' - ')}}
                        </td>
                        <td>
                            <a class="btn-floating btn-small waves-effect waves-light yellow"
                               href="{{route('usuarios.edit',$user->id)}}"><i class="material-icons">edit</i></a>
                            <form action="{{route('usuarios.destroy',$user->id)}}" method="post" style="display:inline"
                                  class="confirm-eliminar">
                                @csrf
                                @method('DELETE')
                                <button class="btn-floating btn-small waves-effect waves-light red"><i
                                            class="material-icons">delete</i></button>

                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
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
