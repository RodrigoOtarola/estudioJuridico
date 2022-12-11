@extends('layouts.layouts')

@section('content')
    <br><br>

    <div class="container white">
        <div class="valing-wrapper">
            <div class="row">
                <div class="col s12 m12 l12 xl12">
                    <div class="col s12 m12 l12 xl12">
                        <div class="col s6 m6 l6 xl6 black-text left">
                            Iniciar Sesión
                        </div>
{{--                        <div class="right">--}}
{{--                            <a href="{{route('register')}}">--}}
{{--                                <button class="btn blue">Registrate</button>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                    </div>
                    <div class="divider"></div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="">
                            <label for="email"
                                   class="">{{ __('Email') }}</label>
                            <div class="">
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="" role="">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <label for="password"
                                   class="">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <div class="">
                                    <input class="" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="checkbox" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <button type="submit" class="btn blue waves-effect waves-light">
                                    {{ __('Ingresar') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="waves-effect waves-light btn red" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
