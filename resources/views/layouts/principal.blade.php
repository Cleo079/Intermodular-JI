<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    @vite(['resources/css/app.css', 'resources/css/app.scss','resources/js/app.js'])
</head>
<body>
    <div id="app">
        @yield('NavBar')
        @yield('registro')
        @yield('piepagina')
    </div>
</body>
</html>
