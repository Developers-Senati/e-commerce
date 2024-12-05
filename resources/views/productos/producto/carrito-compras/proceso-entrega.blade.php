@extends('layout/navbar-compra')

@section("TituloPagina", "Proceso de Entrega")

@section('contenido')

<div class="container mt-5">
    <!-- Barra de progreso -->
    <div class="entrega-progress-container mt-5">
        <div class="entrega-progress-step active">1<br>Carro</div>
        <div class="entrega-progress-bar-custom">
            <div class="entrega-progress-bar-fill"></div>
        </div>
        <div class="entrega-progress-step active">2<br>Entrega</div>
        <div class="entrega-progress-bar-custom"></div>
        <div class="entrega-progress-step">3<br>Pago</div>
    </div>

    <!-- Paso 2: Entrega -->
    <div class="delivery-container mt-4">
        <h5 class="mb-4">Elige un tipo de entrega</h5>
        
        <!-- Opción 1: Retiro en tienda (Deshabilitada) -->
        <div class="delivery-option disabled">
            <div class="delivery-text">
                <strong>Retira tu pedido</strong>
                <p class="text-muted mb-0">No disponible <a href="#" class="text-decoration-none">¿Por qué?</a></p>
            </div>
        </div>

        <!-- Opción 2: Envío Express -->
        <div class="delivery-option" data-bs-toggle="modal" data-bs-target="#modalDomicilio">
            <div class="delivery-icon">🚀</div>
            <div class="delivery-text">
                <strong>Envío Express</strong>
                <p class="text-muted mb-0">Ingresa tu dirección para continuar</p>
            </div>
        </div>

        <!-- Opción 3: Envío en Fecha Programada -->
        <div class="delivery-option" data-bs-toggle="modal" data-bs-target="#modalDomicilio">
            <div class="delivery-icon">📅</div>
            <div class="delivery-text">
                <strong>Envío en fecha programada</strong>
                <p class="text-muted mb-0">Ingresa tu dirección para continuar</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Dirección de Envío -->
<div class="modal fade" id="modalDomicilio" tabindex="-1" role="dialog" aria-labelledby="modalDomicilioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDomicilioLabel">Datos de Envío a Domicilio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario de Envío -->
            <form action="{{ route('proceso-pago.index', ['id_pedido' => $id_pedido]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="departamento" class="form-label">Departamento</label>
                        <select class="form-select" id="departamento" name="departamento" required>
                            <option selected disabled>Selecciona un Departamento</option>
                            <option value="Lima">Lima</option>
                            <option value="Cusco">Cusco</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="provincia" class="form-label">Provincia</label>
                        <select class="form-select" id="provincia" name="provincia" required>
                            <option selected disabled>Selecciona una Provincia</option>
                            <option value="Provincia 1">Provincia 1</option>
                            <option value="Provincia 2">Provincia 2</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="distrito" class="form-label">Distrito</label>
                        <select class="form-select" id="distrito" name="distrito" required>
                            <option selected disabled>Selecciona un Distrito</option>
                            <option value="Distrito 1">Distrito 1</option>
                            <option value="Distrito 2">Distrito 2</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresa tu dirección" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" required>
                    </div>

                    <div class="mb-3">
                        <label for="instrucciones" class="form-label">Instrucciones adicionales</label>
                        <textarea class="form-control" id="instrucciones" name="instrucciones" placeholder="Ejemplo: Timbre malogrado"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <!-- Botón de Enviar -->
                    <button type="submit" class="btn btn-primary text-white">Continuar a Pago</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
