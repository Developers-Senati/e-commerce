<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    @include('layout.navbar')

    <div class="container">
        <h1>Listado de Reclamaciones</h1>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Tipo de Documento</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Tipo de Bien</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reclamos as $reclamo)
                <tr>
                    <td>{{ $reclamo->tipo_documento }}</td>
                    <td>{{$reclamo->numero_documento}}</td>
                    <td>{{ $reclamo->nombres }} {{ $reclamo->apellido_paterno }}</td>
                    <td>{{ $reclamo->tipo_bien }}</td>
                    <td>
                        <a href="{{ route('reclamaciones.show', $reclamo->id) }}" class="btn btn-info">Ver</a>

                        <!-- Formulario para eliminar -->
                        <form action="{{ route('reclamaciones.destroy', $reclamo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este reclamo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('layout.footer')



</body>

</html>