<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<body>


<h2>Hola {{$name}}</h2>
<hr>


<h2>Estructuras de control</h2>


<h3>Condicional</h3>
@if(true)
    <h4>Es true</h4>
@endif

<h3>Foreach</h3>
<ul>
@foreach($numeros as $number)
        <li>{{$number}}</li>
    @endforeach
</ul>

<hr>
{{--Con lang accedemos a la carpeta lang/idioma y seleccionamos la respuesta de acuerdo al indice del arreglo--}}
<h3>@lang('personalizado.titulo-lang')</h3>


</body>
</html>