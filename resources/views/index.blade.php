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
        @yield('sandulo')
        <div class="majima">
            majima
        </div>
        <div class="kiryu">
            kiryu
        </div>
        @yield('footerV')
    </div>

</body>
</html>
