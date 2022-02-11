@extends('plantillas.plantilla')

@section('title', 'Detalle de la solicitud')

@section('content')
<div id="cajaDetalleSolicitud">
    <h5>Detalle de la solicitud No. {{$solicitud->idSolicitud}}</h5>
    <br>
    <div>
        <div><b>Fecha: </b>{{date('d/m/Y H:i:s')}}</div>
        <div><b>Nombre del empleado: </b>{{$usuario->nombresUsuario}} {{$usuario->apellidosUsuario}}</div>
        <div><b>No. de identificación: </b>{{$usuario->identificacionUsuario}}</div>
        <div><b>Cargo: </b>{{$usuario->cargoUsuario}}</div>
    </div>
    <br>    
    <div>
        <div id="cajaSeleccionarEpp">
            <b>Seleccionar EPP:</b><br>
            <select id="epps" class="selectNombreEpp">
                <option value="" selected disabled>-- Seleccionar --</option>
                <option>Guantes</option>
                <option>Gafas</option>
                <option>Botas</option>
                <option>Chaleco</option>
            </select>
        </div>
        <div id="cajaCantidadEpp">
            <b>Cantidad:</b><br>
            <input type="number" id="cantidad" class="inputCantidad" min="0" max="100">
        </div>
        <button id="botonMostrar">Agregar al resumen</button>
        <br>
        <p id="avisoValidacionEpp" class="avisoValidacion" style="visibility: hidden;"><small><em>*Por favor verifique que todos los campos estén diligenciados.</em></small></p>
    </div>
    
    <h5>Resumen de la solicitud</h5>
    <form name="frmEpp" method="POST" action="{{ route('confirmar') }}">
        @csrf
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre del EPP</th>
                        <th>Cantidad</th>
                        <th>Acción</th>
                    </tr>
                </thead> 
                <tbody>
                </tbody>    
            </table>
        </div>
        <br>
        <p>
            <input type="submit" value="Confirmar" id="botonConfirmar" disabled>
        </p>
    </form>
</div>
<script>    
    $(document).ready(function() {
        $("#botonMostrar").click( function(){
            let itemEpp = $("#epps").val();
            let cantEpp = $("#cantidad").val();

            if(itemEpp == null){
                $("#avisoValidacionEpp").css("visibility", "visible").fadeIn();
            }
            if(cantEpp == ""){
                $("#avisoValidacionEpp").css("visibility", "visible").fadeIn();
            }

            if(itemEpp != null && itemEpp != "" && cantEpp != ""){
                $("#avisoValidacionEpp").css("visibility", "hidden");
                $("tbody").append("<tr><td>"+"<input type='text' class='inputSinBorde' name='nombreEpp[]' value='"+itemEpp+"' readonly>"+"</td><td>"+"<input type='number' class='inputSinBorde' name='cantidadEpp[]' value='"+cantEpp+"' readonly>"+"</td><td style='text-align:center;'><button id='eliminarItem'>Eliminar</button></td></tr>");
                $("#botonConfirmar").prop('disabled', false);
                $("#botonConfirmar").css({"background-color": "rgb(186, 0, 0)","border-color": "rgb(186, 0, 0)", "cursor": "pointer"});
                $("#epps").val($("#epps > option:first").val());
                $("#cantidad").val("");
            }
        });

        $(document).on("click", "#eliminarItem", function(){
                $(this).parent().parent().remove();
            });
    });
</script>
@endsection