<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('imgs/iron_cross.png')}}" type="image/x-icon">
    <title>@yield('titulo')</title>
    @vite(['resources/css/app.css', 'resources/css/app.scss','resources/js/app.js'])
</head>
<body>
    <div id="app">
        <navbar></navbar>
        @yield('contenido')
        <pie></pie>
    </div>
    <script>
        window.routes = {

            usuarios: "{{ route('usuario.index') }}",
            eventos: "{{ route('evento.index') }}",
            estands: "{{ route('estand.index')}}"


        };
        window.assets = {
        ironCross: "{{ asset('imgs/iron_cross.png') }}"
    };
    </script>
</body>
</html>
