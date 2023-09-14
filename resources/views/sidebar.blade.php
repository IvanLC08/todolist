<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TO DO LIST</title>
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link rel="icon" href="{{asset('images/cheque.png')}}">
    @vite(['resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container-fluid row" style="padding-left: 0px; margin-left:0px; padding-right: 0px; margin-right: 0px;">
        {{-- Sidebar --}}
        <div class="sidebar col-md-2 d-flex flex-column" style="padding: 20px">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1 class="mt-4 mb-4" style="font-weight: 800 ; color:white">TO DO</h1>
            </div>
            
            <div class="d-flex flex-row justify-content-start align-items-center gap-2 mb-4">
                <img src="{{asset('images/home.png')}}" alt="img_home" style="height: 30px">
                <a class="sidebar_text" href="{{route('index')}}">Tareas</a>
            </div>
        </div>

        {{-- Contenido --}}
        <div id="contenidoDerecha" class="col offset-md-2 mt-4" style="padding:20px">
            @yield('content')
        </div>

    </div>
</body>
</html>