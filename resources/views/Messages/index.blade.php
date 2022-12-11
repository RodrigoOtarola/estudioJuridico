@extends('layouts.layouts')

@section('title','Mensajes')

@section('content')
    <div class="container section">
        <div class="card-panel">
            <h5>Ultimos mensajes recibidos:</h5>
            <table class="striped centered">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Fono</th>
                    <th>Estado</th>
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
                        {{--estadoTramite relacion definida en el modelo Message--}}
                        <td>{{$message->estadoTramite->estado}}
                        <td>
                            <a class="btn-floating btn-small waves-effect waves-light yellow"
                               href="{{route('messages.edit',$message->id)}}"><i class="material-icons">edit</i></a>

                            <button class="btn-floating btn-small waves-effect waves-light red"><i
                                    class="material-icons">delete</i></button>
                        </td>
                    </tr>
                @empty
                    <td colspan="6">No hay mensajes para mostrar.</td>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-panel">
            <h5>Mensajes respondidos:</h5>
            <table class="responsive-table striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Fecha respuesta</th>
                </tr>
                </thead>
                <tbody>
                @forelse($messagesVistos as $messagesVisto)
                    <tr>
                        <td>{{$messagesVisto->name}}</td>
                        <td>{{$messagesVisto->first_name}}</td>
                        <td>{{$messagesVisto->email}}</td>
                        {{--estadoTramite relacion definida en el modelo Message--}}
                        <td>{{$messagesVisto->estadoTramite->estado}}
                        <td>{{$messagesVisto->updated_at->format('d-m-Y')}}</td>
                    </tr>
                @empty
                    <td colspan="6">No hay mensajes para mostrar.</td>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
