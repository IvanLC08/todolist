<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;

class UsuarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');

        // if (Session::get('Nomina') && Session::get('Perfiles')) {
        // } else {
        //     return redirect()->route('inicio-sesion');
        // }
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
            'Nombre' => 'required|string|max:50',
            'Correo' => 'required|email|unique:usuarios,correo_usuario',
            'Contrasenia' => 'required|min:8'
        ]);

        $usuario = new Usuario();
        $usuario -> nombre_usuario = $request->input('Nombre');
        $usuario -> correo_usuario = $request->input('Correo');
        $usuario -> contrasenia_usuario = $request->input('Contrasenia');
        $usuario -> save();

        return redirect()->route('login');
    }

    public function home($idUsuario){

        $tareas = DB::table('tareas')
            ->select('tareas.nombre_tarea',
                        'tareas.fecha_creacion',
                        'tareas.fecha_termino',
                        'estatus.nombre_estatus')
            ->join('estatus', 'tareas.id_estatus', '=', 'estatus.id_estatus')
            ->where('tareas.id_usuario','=',$idUsuario)
            ->get();

        return view('home', compact('tareas'));
    }

    public function completadas(Request $request){
        return view('complete');
    }

    public function pendientes(Request $request){
        return view('pending');
    }
}
