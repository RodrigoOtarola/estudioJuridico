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

@yield('container')

<footer class="footer blue lighten-5">
    <div class="footer-copyright">
        <div class="container">
           Rodrigo Otárola © {{date('Y')}}
            <a class="black-text text-lighten-4 right" href="#">Acá van los iconos de RRSS</a>
        </div>
    </div>
</footer>
</body>
</html>
