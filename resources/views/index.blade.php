<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>

    <div id="app">
        @yield('content')
        <div class="majima">
            <a href="{{ url('registro') }}" class="btn btn-secondary">Registro</a>
        </div>
        <div class="kiryu">
            <a href="{{ url('formulario') }}" class="btn btn-secondary">Iniciar Sesión</a>
        </div>
        @yield('piepagina')
    </div>

</body>
</html>
