@extends('layouts.layouts')

@section('title','Causas')

@section('content')
    <div class="container section">
        <div class="row card-panel">
            <div class="col s12 m12 l12 xl12">
                <div class="col s6 m6 l6 xl6 black-text left">
                    <h5>Listado de causas:</h5>
                </div>
                @auth()
                    @can('create',$newCausa)
                        <div class="right">
                            <a href="{{route('causas.create')}}">
                                <button class="btn blue">Crear causa</button>
                            </a>
                        </div>
                    @endcan
                @endauth
            </div>
            <table class="striped centered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Abogado</th>
                    <th>Tribunal</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                {{--Llenadas dinamicamente desde la DDBB--}}
                @foreach($causas as $causa)
                    <tr>
                        <td>{{$causa->id}}</td>
                        <td>{{$causa->user->pluck('name','1')->implode(' ')}}</td>
                        <td>{{$causa->user->pluck('name')->implode('- ')}}</td>
                        <td>{{$causa->tribunal->pluck('name')->implode(' ')}}</td>
                        <td>{{$causa->estado_causa->estado}}</td>
                        <td>
                            <a class="btn-floating btn-small waves-effect waves-light blue"
                               href="{{route('causas.show',$causa->id)}}"><i class="material-icons">visibility</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

