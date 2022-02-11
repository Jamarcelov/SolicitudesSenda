@extends('plantillas.plantilla')

@section('title', 'Solicitud realizada')

@section('content')
<div id="cajaSolicitudRealizada">
    <br>
    <h1 id="tituloSolicitudRealizada">¡Solicitud realizada!</h1>
    <br><br>
    <p id="textoGracias">Gracias por utilizar Solicitudes Senda S.A.S</p>
    <br><br>
    <form action="{{route('index') }}">
        <button id="botonInicio">Ir al Inicio</button>
    </form>
    <br>
</div>
@endsection