@extends('layout/navbar-compra')

@section("TituloPagina", "Proceso de Compra")

@section('contenido')

<div class="container mt-5">
    <!-- Barra de progreso -->
    <div class="compra-progress-container mt-5">
        <div class="compra-progress-step active">1<br>Compra</div>
        <div class="compra-progress-bar-custom">
            <div class="compra-progress-bar-fill"></div>
        </div>
        <div class="compra-progress-step">2<br>Entrega</div>
        <div class="compra-progress-bar-custom"></div>
        <div class="compra-progress-step">3<br>Pago</div>
    </div>

    <!-- Formulario -->
    <div class="compra-card-container mt-5">
        <h5 class="text-start">Ingresa tu correo electrónico para continuar</h5>
        <p class="text-muted text-center">
            Tu cuenta de email es la misma <br> Úsala si ya estás registrado.
        </p>
        <form action="{{route('proceso-entrega.index')}}" method="GET">
            <div class="mb-4">
                <label for="email" class="form-label">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" name="email"
                    placeholder="Ingresa correo electrónico" required>
            </div>
            <button type="submit" class="btn compra-btn-con btn-dark text-white">Continuar</button>
        </form>
        <p class="compra-small-text">¿Necesitas ayuda? Llámanos al 203-7064</p>
    </div>
</div>

@endsection