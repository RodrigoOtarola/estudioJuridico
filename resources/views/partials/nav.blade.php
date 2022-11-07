<div class="navbar-fixed">
    <nav class="nav-wrapper blue lighten-5">

        <a href="{{route('home')}}" class="brand-logo black-text left">Estudio Jurídico</a>
        <a href="#" data-target="menu-responsive" class="sidenav-trigger right"><i
                class="material-icons black-text">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <!--clase hide-on-med-and-down es para desaparecer menu en responsive-->
            <li><a href="{{route('about')}}" class="black-text">Nosotros</a></li>
            <li><a href="{{route('team.index')}}" class="black-text">Profesionales</a></li>
            <li><a href="{{route('documentation')}}" class="black-text">Documentación</a></li>
            <li><a href="{{route('contact')}}" class="black-text">Contacto</a></li>

            @auth()
                <li><a href="#" class="dropdown-trigger black-text" data-target="id_drop">{{auth()->user()->name}}<i
                            class="material-icons right">arrow_drop_down</i></a>
                </li>
                </li>

            @else
                <li><a class="black-text" href="{{route('login')}}">Login</a></li>
            @endauth
        </ul>
    </nav>
</div>

<!--Si se activa el menu droptown se desplegan estas celdas-->
<ul id="id_drop" class="dropdown-content">
    <li><a href="{{route('messages.index')}}" class="black-text">Mensajes</a></li>
    <li class="divider"></li>
    <li><a href="{{route('causas.index')}}" class="black-text">Causas</a></li>
    <li class="divider" class="black-text"></li>
    <li><a class="black-text" href="#"
           onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
            Cerrar sesión
        </a>
    </li>
    <li class="divider"></li>
    <li><a href="#" class="red-text"><i class="material-icons right">close</i>Cerrar</a></li>
</ul>

<!--Si pasamos a responsive se agrupa menu-->
<ul class="sidenav" id="menu-responsive"><!--id tiene que tener el mismo nombre del data target-->
    <li><a href="{{route('about')}}" class="black-text">Nosotros</a></li>
    <li><a href="{{route('team.index')}}" class="black-text">Profesionales</a></li>
    <li><a href="{{route('documentation')}}" class="black-text">Documentación</a></li>
    <li><a href="{{route('contact')}}" class="black-text">Contacto</a></li>
    <li><a href="{{route('login')}}" class="black-text">Login</a></li>
{{--    <li><a href="#" class="dropdown-trigger" data-target="id_drop">Desplegable<i--}}
{{--                    class="material-icons right">arrow_drop_down</i></a>--}}
{{--    </li>--}}
    <li><a href="{{route('home')}}">Cerrar<i class="material-icons right">close</i></a></li>
</ul>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        M.AutoInit();/*Para inicializar todo lo de JS*/
    });
</script>
