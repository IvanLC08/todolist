@extends('sidebar')

@section('content')
    
    {{-- Seccion para agregar una nueva tarea --}}
    <div class="mb-3">
        <form class="d-flex flex-row" method="POST" action="{{ route('altaTarea') }}">
            @csrf
            <div class="form-group col-md-11" style="padding-right: 10px">
                <input type="text" class="form-control" name="Nombre_tarea" placeholder="Nueva tarea" required>
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary" style="width:100%; background-color:#4AC6B7; border:#4AC6B7">Agregar</button>
            </div>
        </form>
    </div>

    {{-- Lista de tareas
    Recorre la consulta que se trae con la vista y agrega las tareas a un contenedor --}}
    <h1 style="font-size: 30px">Tareas</h1>

    @foreach ($tareas as $tarea)
        <div class="card mb-2">
            <div class="card-body">
                <form  class="d-flex flex-row" method="POST" 
                        @if ($tarea->terminado == true)
                            action="{{route('eliminarTarea')}}"
                        @else
                            action="{{route('modificarTarea')}}"
                        @endif>
                    @csrf
                    <div class="d-flex flex-row col-md-10">
                        <input type="hidden" name="id_tarea" value="{{$tarea->id_tarea}}" style="display: none">
                        <div class="form-check d-flex justify-content-center align-items-center">
                            <input class="form-check-input" type="checkbox" name="hecho" id="checkboxHecho" value="true" 
                                    style="height: 30px; width:30px;" disabled
                                    @if ($tarea->terminado == true)
                                        checked
                                    @endif>
                        </div>
                        <div class="d-flex flex-column justify-content-center" style="margin-left: 15px;">
                            
                            <p  @if ($tarea->terminado == true) 
                                    style="font-weight:800; font-size:15px; margin-bottom: 0px; text-decoration:line-through" 
                                @else
                                    style="font-weight:800; font-size:15px; margin-bottom: 0px;"
                                @endif>{{$tarea->nombre_tarea}}</p>
                            
                            <p style="margin-bottom: 0px;">Fecha de creación :&ensp;{{$tarea->fecha_creacion}}</p>
                            
                            @if ($tarea->fecha_termino != NULL)
                                <p style="margin-bottom: 0px;">Fecha de termino :{{$tarea->fecha_termino}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center justify-content-end col-md-2">
                        @if ($tarea->terminado == false)
                            <button type="submit" class="btn btn-primary" style="background-color:#80D27E; border:#80D27E">Completar</button>
                        @else
                            <button type="submit" class="btn"><img src="{{asset('images/borrar.png')}}" alt="img_borrar" style="height:25px; width:25px"></button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <div class="d-flex flex-row justify-content-end">
        <a class="btn btn-primary" href="{{route('exportar')}}">Exportar</a>
    </div>

@endsection