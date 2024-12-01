<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    @include('layout.navbar')

    @section('content')


    <div class="container">
        <h2>Datos Personales</h2>





        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif






        <form action="{{ route('reclamaciones.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tipo_documento">Tipo de Documento</label>
                <select name="tipo_documento" id="tipo_documento" class="form-control">
                    <option value="DNI">DNI</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="CE">Carné de Extranjería</option>
                </select>
            </div>
            <div class="form-group">
                <label for="numero_documento">Nro. Documento</label>
                <input type="text" name="numero_documento" id="numero_documento" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apellido_paterno">Apellido Paterno</label>
                <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apellido_materno">Apellido Materno</label>
                <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" name="nombres" id="nombres" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apoderado">Datos del Apoderado (Padre o Madre)</label>
                <input type="text" name="apoderado" id="apoderado" class="form-control">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="urbanizacion">Urbanización</label>
                <input type="text" name="urbanizacion" id="urbanizacion" class="form-control">
            </div>
            <div class="form-group">
                <label for="departamento">Departamento</label>
                <input type="text" name="departamento" id="departamento" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="provincia">Provincia</label>
                <input type="text" name="provincia" id="provincia" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="distrito">Distrito</label>
                <input type="text" name="distrito" id="distrito" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="celular">Celular</label>
                <input type="text" name="celular" id="celular" class="form-control">
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" name="correo_electronico" id="correo" class="form-control" required>

            </div>
            <div class="form-group">
                <label for="medio_respuesta">Medio de Respuesta</label>
                <select name="medio_respuesta" id="medio_respuesta" class="form-control" required>
                    <option value="Correo electrónico">Correo electrónico</option>
                    <option value="Teléfono">Teléfono</option>
                </select>
            </div>

            <h2>Bien Contratado</h2>
            <div class="form-group">
                <label><input type="checkbox" name="tipo_bien[]" value="Producto"> Producto</label>
                <label><input type="checkbox" name="tipo_bien[]" value="Servicio"> Servicio</label>
            </div>

            <div class="form-group">
                <label for="descripcion_bien">Descripción del Bien</label>
                <textarea name="descripcion_bien" id="descripcion_bien" class="form-control" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="monto_reclamado">Monto Reclamado S/</label>
                <input type="number" name="monto_reclamado" id="monto_reclamado" class="form-control">
            </div>

            <h2>Datos del Reclamo / Queja</h2>
            <div class="form-group">
                <label for="motivo_contacto">Motivo de Contacto</label>
                <select name="motivo_contacto" id="motivo_contacto" class="form-control">
                    <option value="Consulta">Queja</option>
                    <option value="Reclamo">Reclamo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="motivo_reclamo">Motivo del Reclamo / Queja</label>
                <input type="text" name="motivo_reclamo" id="motivo_reclamo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="detalle">Detalle</label>
                <textarea name="detalle" id="detalle" class="form-control" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="pedido">Pedido</label>
                <textarea name="pedido" id="pedido" class="form-control" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>



    @include('layout.footer')


</body>


</html>