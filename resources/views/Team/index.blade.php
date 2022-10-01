@extends('layouts.layouts')

@section('title','Equipo')

@section('content')
    <div class="container section">
        <div class="row card-panel">
            <div class="col s12 m12 l12 xl12">
                <div class="col s6 m6 l6 xl6 black-text left">
                    <h5>Nuestros Profesionales:</h5>
                </div>
                @auth()
                    <div class="right">
                        <a href="{{route('team.create')}}">
                            <button class="btn blue">Crear profesional</button>
                        </a>
                    </div>
                @endauth
            </div>
            <div class="row">
                <div class="col s12 m4 l4 xl3">
                    <div class="card small">
                        <div class="card-image waves-effect waves-light">
                            <img src="/img/persona.jpg" alt="">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator">Juan Lorca R.<i
                                    class="material-icons right">more_vert</i></span>
                            <p><a href="#">Acerca de el..</a></p>
                        </div>
                        <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Card Title<i
                                        class="material-icons right">close</i></span>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium sapiente minima
                                sequi cupiditate at voluptatem.</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4 l4 xl3">
                    <div class="card small">
                        <div class="card-image waves-effect waves-light">
                            <img src="/img/persona.jpg" alt="">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator">Juan Lorca R.<i
                                    class="material-icons right">more_vert</i></span>
                            <p><a href="#">Acerca de el..</a></p>
                        </div>
                        <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Card Title<i
                                        class="material-icons right">close</i></span>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium sapiente minima
                                sequi cupiditate at voluptatem.</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4 l4 xl3">
                    <div class="card small">
                        <div class="card-image waves-effect waves-light">
                            <img src="/img/persona.jpg" alt="">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator">Juan Lorca R.<i
                                    class="material-icons right">more_vert</i></span>
                            <p><a href="#">Acerca de el..</a></p>
                        </div>
                        <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Card Title<i
                                        class="material-icons right">close</i></span>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium sapiente minima
                                sequi cupiditate at voluptatem.</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4 l4 xl3">
                    <div class="card small">
                        <div class="card-image waves-effect waves-light">
                            <img src="/img/persona.jpg" alt="">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator">Juan Lorca R.<i
                                    class="material-icons right">more_vert</i></span>
                            <p><a href="#">Acerca de el..</a></p>
                        </div>
                        <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Card Title<i
                                        class="material-icons right">close</i></span>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium sapiente minima
                                sequi cupiditate at voluptatem.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
