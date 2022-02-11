@extends('plantillas.plantilla')

@section('title', 'Solicitud')

@section('content')
<div id="cajaCrearSolicitud">
    <h5>Solicitudes Senda S.A.S</h5>
    <br>
    <p><em>¡Hola {{$usuario->nombresUsuario}}!</em></p>
    <form name="frmSolicitud" method="POST" action="{{ route('crear') }}">
        @csrf
        <p id="solicitud">
            <b>Seleccionar el tipo de  solicitud:</b><br>
            <select id="selSolicitud" name="selSolicitud" class="selectSolicitud" onchange="mostrarCategoria(this.value)" required>
                <option value="" selected disabled>-- Seleccionar --</option>
                <option value="categoriaDotacion">Dotación</option>
            </select>
        </p>
        <p id="categoriaVacia" name="categoriaVacia">
            <b>Seleccionar el tipo de categoría:</b><br>
            <select id="selCategoriaVacia" name="selCategoriaVacia" class="selectSolicitud">
                <option value="" selected disabled>-- Seleccionar --</option>
            </select>            
        </p>
        <p id="categoriaDotacion" style="display: none;">
            <b>Seleccionar el tipo de categoría:</b><br>
            <select id="categoria" name="categoriaDotacion" class="selectSolicitud" onchange="mostrarServicio(this.value)"  required>
                <option value="" selected disabled>-- Seleccionar --</option>
                <option value="servicioHSE">HSE</option>
            </select>
        </p>
        <p id="servicioVacio">
            <b>Seleccionar el tipo de servicio:</b><br>
            <select id="selServicioVacio" name="selServicioVacio" class="selectSolicitud">
                <option value="" selected disabled>-- Seleccionar --</option>
            </select>            
        </p>
        <p id="servicioHSE" style="display: none;">
            <b>Seleccionar el tipo de servicio:</b><br>
            <select name="servicio" class="selectSolicitud" required>
                <option value="" selected disabled>-- Seleccionar --</option>
                <option value="EPP">EPP</option>
            </select>
        </p>
        <p>
            <b>Descripción:</b><br>
            <textarea name="descripcionSolicitud" class="selectSolicitud" required></textarea>
        </p>
        <p>
            <input type="submit" value="Crear" id="botonSolicitud">
        </p>
    </form>
</div>  
<script>    
function mostrarCategoria(id){
    if (id == "categoriaDotacion") {
        $("#categoriaVacia").hide();
        $("#categoriaDotacion").show();
    }
}

function mostrarServicio(id){
    if(id == "servicioHSE"){
        $("#servicioVacio").hide();
        $("#servicioHSE").show();
    }
}
</script>
@endsection