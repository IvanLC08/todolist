<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exportar</title>
</head>
<body>
    <h1>TO DO LIST</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre de la tarea</th>
                <th scope="col">Hecho</th>
                <th scope="col">Fecha de creacion</th>
                <th scope="col">Fecha de realización</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $tarea)
                <tr>
                    <td>{{$tarea->nombre_tarea}}</td>
                    <td>@if ($tarea->terminado == 1)Completada @else No completada @endif</td>
                    <td>{{$tarea->fecha_creacion}}</td>
                    <td>{{$tarea->fecha_termino}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>