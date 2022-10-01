@extends('layouts.layouts')

@section('title','Mensajes')

@section('content')
    <div class="container section">
        <div class="card-panel">
            <h5>Ultimos mensajes recibidos: se llena dinamicamente desde la ddbb</h5>
            <table class="responsive-table striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Fono</th>
                    <th>Asunto</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Alvin</td>
                    <td>Eclair</td>
                    <td>$0.87</td>
                    <td>$0.87</td>
                    <td>$0.87</td>
                </tr>
                <tr>
                    <td>Alan</td>
                    <td>Jellybean</td>
                    <td>$3.76</td>
                    <td>$3.76</td>
                    <td>$3.76</td>
                </tr>
                <tr>
                    <td>Jonathan</td>
                    <td>Lollipop</td>
                    <td>$7.00</td>
                    <td>$7.00</td>
                    <td>$7.00</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
