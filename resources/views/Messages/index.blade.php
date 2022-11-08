@extends('layouts.layouts')

@section('title','Mensajes')

@section('content')
    <div class="container section">
        <div class="card-panel">
            <h5>Ultimos mensajes recibidos:</h5>
            <table class="responsive-table striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Fono</th>
                    <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                @forelse($messages as $message)
                <tr>
                    <td>{{$message->name}}</td>
                    <td>{{$message->first_name}}</td>
                    <td>{{$message->email}}</td>
                    <td>{{$message->phone}}</td>
                    <td>
                        <a class="btn-floating btn-small waves-effect waves-light yellow"><i class="material-icons">edit</i></a>

                        <a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>
                    </td>
                </tr>
                @empty
                    <td colspan="5">No hay personal para mostrar.</td>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
