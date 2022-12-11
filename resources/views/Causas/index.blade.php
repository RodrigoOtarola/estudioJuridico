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
                    <div class="right">
                        <a href="{{route('causas.create')}}">
                            <button class="btn blue">Crear causa</button>
                        </a>
                    </div>
                @endauth
            </div>
            <table class="striped centered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Abogado</th>
                    <th>Tribunal</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    {{--Llenadas dinamicamente desde la DDBB--}}
{{--                    <td>Alvin</td>--}}
{{--                    <td>Eclair</td>--}}
{{--                    <td>$0.87</td>--}}
{{--                    <td>$0.87</td>--}}
{{--                    --}}{{--{{route('causas.edit',$causas->id)}}--}}
{{--                    <td><a class="btn-floating btn-small waves-effect waves-light yellow"--}}
{{--                           href=""><i class="material-icons">edit</i></a>--}}

{{--                        <button class="btn-floating btn-small waves-effect waves-light red"><i--}}
{{--                                class="material-icons">delete</i></button>--}}
{{--                    </td>--}}
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

