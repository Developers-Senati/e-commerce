@extends('layout/navbar')

@section("TituloPagina", "Dashboard")

@section('contenido')

<div>
    @include('layout.sidebar')
</div>

<div class="container">

    <h1>Dashboard</h1>


    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-3">

        </div>
        <div class="col-3">

        </div>
        <div class="col-3">

        </div>
    </div>

    <div class="row">
        <!-- Renderizar el gráfico -->
        <div class="col-3" style="margin: auto;">
            {!! $chart->container() !!}  
        </div>
        <div class="col-3" style="margin: auto;">
            {!! $chart2->container() !!}  
        </div>
        <div class="col-3" style="margin: auto;">
            {!! $chart3->container() !!}  
        </div>
        <div class="col-3" style="margin: auto;">
            {!! $chart4->container() !!}  
        </div>
    </div>

    <div class="row">
        <!-- Renderizar el gráfico -->
        <div class="col-3" style="margin: auto;">
            {!! $chart5->container() !!}  
        </div>
        <div class="col-3" style="margin: auto;">
            {!! $chart6->container() !!}  
        </div>
        <div class="col-3" style="margin: auto;">
            {!! $chart7->container() !!}  
        </div>
        <div class="col-3" style="margin: auto;">
            {!! $chart8->container() !!}  
        </div>
    </div>

    <div class="row">
        <!-- Renderizar el gráfico -->
        <div class="col-3" style="margin: auto;">
            {!! $chart9->container() !!}  
        </div>
        <div class="col-3" style="margin: auto;">
            {!! $chart10->container() !!}  
        </div>
        <div class="col-3" style="margin: auto;">
            {!! $chart11->container() !!}  
        </div>
        <div class="col-3" style="margin: auto;">
            {!! $chart12->container() !!}  
        </div>
    </div>

    <div class="row">
        <div class="col-4" style="margin: auto;">

        </div>
        <div class="col-8" style="margin: auto;">

        </div>
    </div>

    <div class="row">
        <div class="col-4" style="margin: auto;">

        </div>
        <div class="col-4" style="margin: auto;">

        </div>
        <div class="col-4" style="margin: auto;">

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