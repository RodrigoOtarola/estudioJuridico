@extends('layouts.layouts')

@section('title','Listar noticias')

@section('content')
    <div class="container section">
        <div class="card-panel">
            <div class="row">
                <div class="col s12 m12 l12 xl12">
                    <div class="col s6 m6 l6 xl6 black-text left">
                        <h5>Listado de noticias:</h5>
                    </div>
                    <div class="right">
                        <a href="{{route('noticias.create')}}">
                            <button class="btn blue">Crear noticia</button>
                        </a>
                    </div>
                </div>
            </div>

            <table class="responsive-table striped">
                <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @forelse($news as $new)
                    <tr>
                        <td>{{$new->title}}</td>
                        <td>{{$new->created_at->diffForHumans()}}</td>
                        <td>
                            <a class="btn-floating btn-small waves-effect waves-light yellow"
                               href="{{route('noticias.edit',$new->id)}}"><i class="material-icons">edit</i></a>
                            <form action="{{route('noticias.destroy',$new->id)}}" method="post" style="display:inline"
                                  class="confirm-eliminar">
                                @csrf
                                @method('DELETE')
                                <button class="btn-floating btn-small waves-effect waves-light red"><i
                                        class="material-icons">delete</i></button>

                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="5">No hay noticias para mostrar.</td>
                @endforelse
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
