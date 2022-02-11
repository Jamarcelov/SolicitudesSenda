<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingreso a solicitudes Senda S.A.S</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/miEstilo.css')}}">
    <link rel="icon" href="{{asset('/imagenes/iconoSenda.png')}}" type="image/png" sizes="16x16">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <!-- Encabezado de página -->
        <div class="row">
            <div class="col">
                <header>
                    @include('vistasParciales.header')
                </header>
            </div>
        </div>
        <!-- Cuadro del formulario -->
        <div class="row">
            <div class="col">
                <div id="cajaIndexSolicitud">
                    <h5>¡Bienvenido a Solicitudes Senda S.A.S!</h5>
                    <img id="imagenSendaIndex" src="{{asset('/imagenes/logoSenda.png')}}" class="img-fluid">
                    <br>
                    <p><em>Por favor, ingrese los siguientes datos:</em></p>
                    <form name="frIngreso" method="POST" action="{{ route('ingreso') }}">
                        @csrf
                        <p>
                            <b>Nombres: </b><br>
                            <input type="text" name="nombresUsuario" class="cuadroTexto" value="{{old('nombresUsuario')}}" required>
                        </p>
                        <p>
                            <b>Apellidos: </b><br>
                            <input type="text" name="apellidosUsuario" class="cuadroTexto" value="{{old('apellidosUsuario')}}" required>
                        </p>
                        <p>
                            <b>No. de identificación: </b><br>
                            <input type="text" name="identificacionUsuario" class="cuadroTexto" value="{{old('identificacionUsuario')}}" required>
                        </p>
                        <p>
                            <b>Cargo: </b><br>
                            <input type="text" name="cargoUsuario" class="cuadroTexto" value="{{old('cargoUsuario')}}" required>
                        </p>
                        <p>
                            <input type="submit" value="Ingresar" id="botonIndex">
                        </p>
                    </form>
                </div>
            </div>
         </div>
        <hr>
        <!-- Pie de página -->
        <div class="row">
            <div class="col">
                <footer>
                    @include('vistasParciales.footer')
                </footer>
            </div>
         </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>