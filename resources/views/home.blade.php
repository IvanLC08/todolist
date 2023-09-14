@extends('sidebar')

@section('content')
    
    <div class="mb-3">
        <form class="d-flex flex-row" method="POST" action="{{ route('altaTarea') }}" enctype="multipart/form-data" >
            @csrf
            {{-- <input type="text" type="hidden" name="id_usuario" value="{{$usuario->id_usuario}}" style="display: none"> --}}
            <div class="form-group col-md-11">
                <input type="text" class="form-control" name="Nombre_tarea" placeholder="Nueva tarea" required>
            </div>
            <div class="col-md-1" style="margin-left: 5px">
                <button type="submit" class="btn btn-primary" style="width:100%; background-color:#80D27E; border:#80D27E">Agregar</button>
            </div>
        </form>
    </div>

    <h1 style="font-size: 30px">Tareas</h1>

    @foreach ($tareas as $tarea)
        <div class="card mb-2">
            <div class="card-body d-flex flex-row">
                <div class="form-check d-flex justify-content-center align-items-center">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" 
                    style="height: 30px; width:30px;">
                </div>
                <div class="d-flex flex-column justify-content-center" style="margin-left: 15px;">
                    <p style="font-weight:800; font-size:20px; margin-bottom: 0px;">{{$tarea->nombre_tarea}}</p>
                    <p style="margin-bottom: 0px;">Fecha de creación:{{$tarea->fecha_creacion}}</p>
                </div>
            </div>
        </div>
    @endforeach

    {{-- <script>

        obtenerTareas();

        function obtenerTareas() {
            $.ajax({
                url: '{{route(obtenerTareas)}}',
                method: 'GET',
                dataType: 'html',
                success: function (data) {
                    $('#resultado').html(data);
                },
                error: function () {
                    alert('Hubo un error al cargar los datos.');
                }
            });
        }

        // Escucha el evento de clic en el botón y llama a la función cargarDatos
        $('#cargarDatos').click(function () {
            cargarDatos();
        });
    </script> --}}

@endsection