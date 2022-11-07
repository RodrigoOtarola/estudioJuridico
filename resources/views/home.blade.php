@extends('layouts.layouts')

@section('title','Incio')

@section('content')
    <br>
    <div class="container section">
        <div class="row">
            <div class="col s12 m12 l12 x12">
                <!--Para crear imagenes deslizantes-->
                <div class="slider">
                    <ul class="slides">
                        <li>
                            <img
                                src="https://images.pexels.com/photos/2041540/pexels-photo-2041540.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="">
                            <div class="caption center-align">
                                <h3>Lorem, ipsum dolor.</h3>
                                <h5 class="light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus id
                                    consectetur, voluptate quia cumque ut.</h5>
                            </div>
                        </li>
                        <li>
                            <img
                                src="https://images.pexels.com/photos/2393789/pexels-photo-2393789.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="">
                            <div class="caption center-align">
                                <h3>Lorem, ipsum dolor.</h3>
                                <h5 class="light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus id
                                    consectetur, voluptate quia cumque ut.</h5>
                            </div>
                        </li>
                        <li>
                            <img
                                src="https://images.pexels.com/photos/5669602/pexels-photo-5669602.jpeg?auto=compress&cs=tinysrgb&w=600"
                                alt="">
                            <div class="caption center-align">
                                <h3>Lorem, ipsum dolor.</h3>
                                <h5 class="light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus id
                                    consectetur, voluptate quia cumque ut.</h5>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.slider');
            var instances = M.Slider.init(elems)
            var elems = document.querySelectorAll('.materialboxed');
            var instances = M.Materialbox.init(elems);
        });
    </script>
@endsection
