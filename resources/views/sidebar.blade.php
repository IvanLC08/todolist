<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador</title>
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    @vite(['resources/js/app.js'])
</head>

<body>

    <div class="container-fluid row" style="padding-left: 0px; margin-left:0px; padding-right: 0px; margin-right: 0px;">
        {{-- Sidebar --}}
        <div class="sidebar">

        </div>

        {{-- Contenido --}}
        <div id="contenidoDerecha" class="col offset-md-2" style="padding-left: 0px; padding-right:0px;">
            @yield('content')
        </div>

    </div>
</body>
</html>