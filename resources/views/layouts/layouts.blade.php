<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="/img/icon.png">
    <link rel="stylesheet" href="/css/style.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--Google Icon-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
@include('partials.nav')

@yield('content')

<footer class="footer blue lighten-5">
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col s12 m6 l6 xl6 center">
                    By Rodrigo Otárola © {{date('Y')}}
                </div>
                <div class="col s12 m6 l6 xl6 center">
                    <span>Buscanos en nuestras RR.SS:</span>
                    <a class="" href="#">
                        <img src="/img/facebook.png" alt="25" width="20">
                    </a>
                    <a class="" href="#">
                        <img src="/img/instagram.png" alt="25" width="20">
                    </a>
                    <a class="center" href="https://www.google.cl">
                        <img src="/img/wsp.png" alt="25" width="20">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
