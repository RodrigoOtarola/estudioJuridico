@extends('layouts.layouts')

@section('title', 'Documentacion')

@section('content')
    <div class="container section">
        <div class="card-panel">
            <h5>Documentación importante:</h5>
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">list_alt</i>
                        Ultimas leyes publicadas
                        <span class="badge"></span>
                    </div>
                    <div class="collapsible-body white">
                        <ul class="collection">
                            @foreach($registros as $ley)
                                <li class="collection-item">
                                    {{$ley['fecha_publicacion']}} - {{$ley['titulo']}} - {{$ley['organismo']}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">list_alt</i>
                        Indicadores economicos.
                        <span class="badge"></span>
                    </div>
                    <div class="collapsible-body white">
                        <p>Últimos 6 indicadores, haz click en solicitado:</p>
                        @include('partials.indicadores')
                    </div>
                </li>
                <li>
                    @include('partials.feriados')
                </li>
            </ul>
        </div>
    </div>
@endsection
