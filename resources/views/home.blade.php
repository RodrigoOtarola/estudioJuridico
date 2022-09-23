@extends('layouts.layouts')

@section('title','Incio')

@section('container')
    <br>
    <div class="container section white">
        <div class="row">
            <div class="col s12 m-6 l-6 xl-6">
                <!--Para crear imagenes deslizantes-->
                <div class="slider">
                    <ul class="slides">
                        <li>
                            <img
                                src="https://images.pexels.com/photos/4502161/pexels-photo-4502161.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                alt="">
                            <div class="caption center-align">
                                <h3>Lorem, ipsum dolor.</h3>
                                <h5 class="light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus id
                                    consectetur, voluptate quia cumque ut.</h5>
                            </div>
                        </li>
                        <li>
                            <img
                                src="https://images.pexels.com/photos/11160230/pexels-photo-11160230.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                alt="">
                            <div class="caption center-align">
                                <h3>Lorem, ipsum dolor.</h3>
                                <h5 class="light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus id
                                    consectetur, voluptate quia cumque ut.</h5>
                            </div>
                        </li>
                        <li>
                            <img
                                src="https://images.pexels.com/photos/8685551/pexels-photo-8685551.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
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
