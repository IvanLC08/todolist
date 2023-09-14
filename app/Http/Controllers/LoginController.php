<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function login(Request $request){
        $request->validate( [
            'Correo' => 'required',
            'Contrasenia' => 'required|max:20',
        ]);

        try {
            $usuario = DB::table('usuarios')
            ->where('correo_usuario','=',$request->input('Correo'))
            ->where('contrasenia_usuario','=',$request->input('Contrasenia'))
            ->first();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Un error inesperado ha ocurrido, por favor vuelve a intentar mas tarde');
        }

        if($usuario){
            // $tareas = DB::table('tareas')
            // ->select('tareas.nombre_tarea',
            //             'tareas.fecha_creacion',
            //             'tareas.fecha_termino',
            //             'estatus.nombre_estatus')
            // ->join('estatus', 'tareas.id_estatus', '=', 'estatus.id_estatus')
            // ->where('tareas.id_usuario','=',$usuario->id_usuario)
            // ->get();

            //return $tareas;
            Session::put('id_usuario',$usuario->id_usuario);
            // return route('home')->with('tareas', $tareas);
            // return view('home',compact('usuario','tareas'));
            return redirect()->route('home', ['idUsuario' => $usuario->id_usuario]);
        }
    }

}
