<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Usuario;
Use App\Models\Solicitud;
use App\Models\Servicio;
use App\Models\Estado;
use App\Models\SolicitudEpp;

class SolicitudEppController extends Controller
{
    public function index(){
        return view('solicitudes.index');
    }

    // Método para insertar registro a la tabla usuarios, a partir del formulario de la página index.
    public function ingreso(Request $request){
        $usuario = new Usuario();
        $usuario->nombresUsuario = $request->nombresUsuario;
        $usuario->apellidosUsuario = $request->apellidosUsuario;
        $usuario->identificacionUsuario = $request->identificacionUsuario;
        $usuario->cargoUsuario = $request->cargoUsuario;

        $usuario->save();

        // Una vez insertado el registro, redirecciono a la página solicitud con un parametro que me mostrará el nombre del ultimo registro insertado.
        return redirect()->route('solicitud', $usuario);
    }

    // Método que muestra el primer paso para crear una solicitud y me retorna el nombre del ultimo registro insertado.
    public function solicitud($idUsuario){
        $usuario = DB::table('usuarios')->orderBy('idUsuario', 'desc')->first();

        return view('solicitudes.solicitud', compact('usuario'));
    }

    public function crear(Request $request){
        $usuario = DB::table('usuarios')->orderBy('idUsuario', 'desc')->first();
        $servicio = DB::table('servicios')->where('idServicio', 1)->first();
        $estado = DB::table('estados')->where('idEstado', 1)->first();

        $solicitud = new Solicitud();
        $solicitud->idUsuarioFK = $usuario->idUsuario;
        $solicitud->idServicioFK = $servicio->idServicio;
        $solicitud->idEstadoFK = $estado->idEstado;
        $solicitud->descripcionSolicitud = $request->descripcionSolicitud;

        $solicitud->save();

        return redirect()->route('detalle', $solicitud);
    }

    public function detalle($idSolicitud){
        $solicitud = DB::table('solicitudes')->orderBy('idSolicitud', 'desc')->first();
        
        $usuario = new Usuario();
        $usuario = DB::table('usuarios')->orderBy('idUsuario', 'desc')->first();

        return view('solicitudes.detalleSolicitud', compact('solicitud', 'usuario'));
    }

    public function confirmar(Request $request){
        $solicitud = DB::table('solicitudes')->orderBy('idSolicitud', 'desc')->first();
        
        $nombreEpp = $request->input('nombreEpp');
        $cantidadEpp = $request->input('cantidadEpp');

        foreach($nombreEpp as $idx => $nombre){
            $cantidad = $cantidadEpp[$idx];

            $solicitudEpp = new SolicitudEpp();
            $solicitudEpp->idSolicitudFK = $solicitud->idSolicitud;
            $solicitudEpp->nombreEpp = $nombre;
            $solicitudEpp->cantidadSolicitudEpp = $cantidad;
            $solicitudEpp->save();
        }
        return redirect()->route('solicitudRealizada');
    }

    public function solicitudRealizada(){
        return view('solicitudes.solicitudRealizada');
    }
}
