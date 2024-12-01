@extends('layout/navbar')

@section("TituloPagina", "Dashboard")

@section('contenido')

<div>
    @include('layout.sidebar-user')
</div>

<div class="container">

    <h1>Dashboard</h1>

    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-10">
            <div class="row">
                <div class="col-2 dashboard-card">
                    Total de Productos: {{ $totalProductos }}
                </div>
                <div class="col-2 dashboard-card">
                    Total de Proveedores: {{ $totalProveedores }}
                </div>
                <div class="col-2 dashboard-card">
                    Total de Ingresos: S/. {{ number_format($totalIngresos, 2) }}
                </div>
                <div class="col-2 dashboard-card">
                    Total de Pedidos: {{ $totalPedidos }}
                </div>
                <div class="col-2 dashboard-card">

                </div>
                <div class="col-2 dashboard-card">

                </div>
            </div>

            <div class="row">
                <!-- Renderizar el gráfico -->
                <div class="col-8" style="margin: auto;">
                    {!! $chartLine->container() !!}
                </div>
                <div class="col-4" style="margin: auto;">
                    {!! $chartVerticalBar->container() !!}
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-2" style="margin: auto;">

                        </div>
                        <div class="col-4" style="margin: auto;">
                            {!! $chartVerticalBar2->container() !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" style="margin: auto;">
                            
                        </div>
                        <div class="col-2" style="margin: auto;">
                            
                        </div>
                    </div>
                </div>
                <div class="col-3" style="margin: auto;">
                    
                </div>
                <div class="col-3" style="margin: auto;">
                    
                </div>
            </div>

            <div class="row">
                <!-- Renderizar el gráfico -->
                <div class="col-7" style="margin: auto;">
                    {!! $chartHorizontalBar->container() !!}
                </div>
                <div class="col-5" style="margin: auto;">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Agregar la CDN de FusionCharts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{!! $chartLine->script() !!}
{!! $chartVerticalBar->script() !!}
{!! $chartVerticalBar2->script() !!}
{!! $chartHorizontalBar->script() !!}





@endsection