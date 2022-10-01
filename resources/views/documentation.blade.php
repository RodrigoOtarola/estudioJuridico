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
                        <p>API de la bibliteca del congreso.</p>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">list_alt</i>
                        Indicadores economicos.
                        <span class="badge"></span>
                    </div>
                    <div class="collapsible-body white">
                        <p>Selecciona el indicador:</p>
                        <p>API de CMF</p>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">list_alt</i>
                        Feriados en chile.
                        <span class="badge"></span>
                    </div>
                    <div class="collapsible-body white">
                        <p>API de feriados</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
