<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tarea;
use Carbon\Carbon;

class TareaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre_tarea' => 'required|max:50'
        ]);

        $tarea = new Tarea();
        $tarea -> nombre_tarea = $request->input('Nombre_tarea');
        $tarea->fecha_creacion = now('America/Mexico_City');
        $tarea -> id_estatus = 1;
        $tarea -> id_usuario = $request->input('id_usuario');
        $tarea -> save();

        return redirect()->back()->with('success','HECHO');
        // return redirect()->route('home')->with('success','Tarea creada correctamente');
    }
}
