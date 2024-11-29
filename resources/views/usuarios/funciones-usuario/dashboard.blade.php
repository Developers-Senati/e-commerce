@extends('layout/navbar')

@section("TituloPagina", "Dashboard")

@section('contenido')

<div>
    @include('layout.sidebar')
</div>

<div class="container">


    @php
        use ConsoleTVs\Charts\Classes\Chartjs\Chart;

        // Crear el gráfico
        $chart = new Chart;
        $chart->labels($productos->pluck('nombre_producto')) // Etiquetas (productos)
            ->dataset('Stock', 'bar', $productos->pluck('stock')) // Datos (stock)
            ->color('rgba(75, 192, 192, 1)') // Color de las barras
            ->backgroundColor('rgba(75, 192, 192, 0.2)'); // Fondo de las barras

        $chartTiposUsuarios = new Chart;
        $chartTiposUsuarios->labels($tiposUsuarios->pluck('tipo_usuario')) // Etiquetas
            ->dataset('Usuarios', 'pie', $tiposUsuarios->pluck('total')) // Datos
            ->backgroundColor(['#FF6384', '#36A2EB', '#FFCE56']); // Colores

        $chartEstadoUsuarios = new Chart;
        $chartEstadoUsuarios->labels($estadosUsuarios->pluck('estado')) // Etiquetas
            ->dataset('Estado de Usuarios', 'doughnut', $estadosUsuarios->pluck('total')) // Datos
            ->backgroundColor(['#4CAF50', '#F44336']); // Colores

        $chartProductosCategoria = new Chart;
        $chartProductosCategoria->labels($productosCategoria->pluck('categoria')) // Etiquetas
            ->dataset('Productos', 'bar', $productosCategoria->pluck('total')) // Datos
            ->color('rgba(54, 162, 235, 1)') // Color de las barras
            ->backgroundColor('rgba(54, 162, 235, 0.2)'); // Fondo

        $chartIngresos = new Chart;
        $chartIngresos->labels($ingresosVentas->pluck('fecha')) // Fechas
            ->dataset('Ingresos', 'line', $ingresosVentas->pluck('ingresos')) // Datos
            ->color('rgba(255, 99, 132, 1)') // Línea
            ->backgroundColor('rgba(255, 99, 132, 0.2)') // Fondo bajo la línea
            ->options(['responsive' => true, 'maintainAspectRatio' => false]); // Ajustes

        $chartMetodosPago = new Chart;
        $chartMetodosPago->labels($metodosPago->pluck('nombre_metodo_pago')) // Etiquetas
            ->dataset('Métodos de Pago', 'polarArea', $metodosPago->pluck('total')) // Datos
            ->backgroundColor(['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#F44336']); // Colores

        $chartEstadoPedidos = new Chart;
        $chartEstadoPedidos->labels($estadosPedidos->pluck('estado')) // Etiquetas
            ->dataset('Estado de Pedidos', 'horizontalBar', $estadosPedidos->pluck('total')) // Datos
            ->color('rgba(153, 102, 255, 1)') // Color de las barras
            ->backgroundColor('rgba(153, 102, 255, 0.2)'); // Fondo

        $chartTiemposEntrega = new Chart;
        $chartTiemposEntrega->labels($tiemposEntrega->pluck('fecha_envio')) // Fechas de Envío
            ->dataset('Días Estimados', 'line', $tiemposEntrega->pluck('dias_estimados')) // Datos
            ->color('rgba(255, 206, 86, 1)') // Línea
            ->backgroundColor('rgba(255, 206, 86, 0.2)'); // Fondo

    @endphp

    <div class="row">
        <!-- Renderizar el gráfico -->
        <div class="col-4" style="margin: auto;">
            {!! $chart->container() !!}
        </div>
        <div class="col-4" style="margin: auto;">
            {!! $chartTiposUsuarios->container() !!}
        </div>
        <div class="col-4" style="margin: auto;">
            {!! $chartEstadoUsuarios->container() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-4" style="margin: auto;">
            {!! $chartProductosCategoria->container() !!}
        </div>
        <div class="col-8" style="margin: auto;">
            {!! $chartIngresos->container() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-4" style="margin: auto;">
            {!! $chartMetodosPago->container() !!}
        </div>
        <div class="col-4" style="margin: auto;">
            {!! $chartEstadoPedidos->container() !!}
        </div>
        <div class="col-4" style="margin: auto;">
            {!! $chartTiemposEntrega->container() !!}
        </div>
    </div>
</div>

<!-- Incluir los scripts necesarios -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{!! $chart->script() !!}
{!! $chartTiposUsuarios->script() !!}
{!! $chartEstadoUsuarios->script() !!}
{!! $chartProductosCategoria->script() !!}
{!! $chartIngresos->script() !!}
{!! $chartMetodosPago->script() !!}
{!! $chartEstadoPedidos->script() !!}
{!! $chartTiemposEntrega->script() !!}


@endsection