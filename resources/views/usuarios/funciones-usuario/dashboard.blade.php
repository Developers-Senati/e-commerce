@extends('layout/navbar')

@section("TituloPagina", "Dashboard")

@section('contenido')

<div>
    @include('layout.sidebar')
</div>

<div class="container">

    <h1>Dashboard</h1>

    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-10">
            <div class="row">
                <div class="col-2">
                    Total de Productos: {{ $totalProductos }}
                </div>
                <div class="col-2">
                    Total de Proveedores: {{ $totalProveedores }}
                </div>
                <div class="col-2">
                    Total de Ingresos: S/. {{ number_format($totalIngresos, 2) }}
                </div>
                <div class="col-2">
                    Total de Pedidos: {{ $totalPedidos }}
                </div>
                <div class="col-2">

                </div>
                <div class="col-2">

                </div>
            </div>

            <div class="row">
                <!-- Renderizar el gráfico -->
                <div class="col-8" style="margin: auto;">
                    {!! $chart2->container() !!}
                </div>
                <div class="col-4" style="margin: auto;">
                    {!! $chart->container() !!}
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-2" style="margin: auto;">
                            {!! $chart3->container() !!}
                        </div>
                        <div class="col-4" style="margin: auto;">
                            {!! $chart4->container() !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" style="margin: auto;">
                            {!! $chart5->container() !!}
                        </div>
                        <div class="col-2" style="margin: auto;">
                            {!! $chart7->container() !!}

                        </div>
                    </div>
                </div>
                <div class="col-3" style="margin: auto;">
                    {!! $chart6->container() !!}
                </div>
                <div class="col-3" style="margin: auto;">
                    {!! $chart8->container() !!}
                </div>
            </div>

            <div class="row">
                <!-- Renderizar el gráfico -->
                <div class="col-7" style="margin: auto;">
                    {!! $chart9->container() !!}
                </div>
                <div class="col-5" style="margin: auto;">
                    {!! $chart11->container() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Agregar la CDN de FusionCharts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{!! $chart->script() !!}
{!! $chart2->script() !!}
{!! $chart3->script() !!}
{!! $chart4->script() !!}
{!! $chart5->script() !!}
{!! $chart6->script() !!}
{!! $chart7->script() !!}
{!! $chart8->script() !!}
{!! $chart9->script() !!}
{!! $chart10->script() !!}
{!! $chart11->script() !!}
{!! $chart12->script() !!}

@endsection