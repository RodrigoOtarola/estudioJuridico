<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensaje recibido</title>
    <style>
        *{
            background-color: #F7F7F7
        }
        .txt{
            text-align: center;
        }

    </style>
</head>
<body>
<h3 class="txt">Hola estimado {{$msg->name}} {{$msg->first_name}}</h3>
<p class="txt">Gracias por querer comunicarte con nosotros, un asesor nuestro te contactara a la brevedad a tu correo
    otorgado {{$msg->email}} <br>
</p>

<h4 class="txt">Gracias.</h4>
</body>
</html>
