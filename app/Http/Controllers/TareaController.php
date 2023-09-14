<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tarea;
use PDF;

class TareaController extends Controller
{
    /**
     * Punto de entrada de la aplicacion
     *
     */
    public function index(Request $request)
    {
        $tareas = DB::table('tareas')
        ->select('tareas.id_tarea',
                    'tareas.nombre_tarea',
                    'tareas.fecha_creacion',
                    'tareas.fecha_termino',
                    'tareas.terminado')
        ->get();

        return view('home', compact('tareas'));
    }

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
        $tarea -> save();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $tarea = Tarea::find($request->id_tarea);
        $tarea->terminado = true;
        $tarea->fecha_termino = now('America/Mexico_City');
        $tarea -> update();

        return redirect()->back();
    }

    /**
     * Delete the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $tarea = Tarea::find($request->id_tarea)->delete();
        return redirect()->back();
    }

    /**
     * Export the specified resource
     *
     */
    public function export()
    {
        $tareas = Tarea::all();
        $pdf = \PDF::loadView('tareas', compact('tareas'))->setPaper('a4', 'landscape');
        return $pdf->stream('tareas.pdf');
    }

}
