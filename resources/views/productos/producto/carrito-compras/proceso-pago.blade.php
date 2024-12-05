@extends('layout/navbar-compra')

@section("TituloPagina", "Proceso de Pago")

@section('contenido')
<div class="container mt-5">
    <!-- Barra de progreso -->
    <div class="pago-progress-container mt-5">
        <div class="pago-progress-step active">1<br>Carro</div>
        <div class="pago-progress-bar-custom">
            <div class="pago-progress-bar-fill"></div>
        </div>
        <div class="pago-progress-step active">2<br>Entrega</div>
        <div class="pago-progress-bar-custom">
            <div class="pago-progress-bar-fill"></div>
        </div>
        <div class="pago-progress-step active">3<br>Pago</div>
    </div>

    <div class="row">
        <!-- Formulario de pago -->
        <div class="col-md-8">
            <h5 class="mb-3">Método de Pago</h5>
            <div class="card p-3 mb-3">
                <input type="radio" id="tarjeta-cmr" name="payment" class="form-check-input me-2" onclick="habilitarBoton()">
                <label for="tarjeta-cmr" class="form-check-label">Tarjeta CMR</label>
            </div>
            <div class="card p-3 mb-3">
                <input type="radio" id="tarjeta-credito" name="payment" class="form-check-input me-2" onclick="habilitarBoton()">
                <label for="tarjeta-credito" class="form-check-label">Tarjeta de crédito</label>
            </div>
            <div class="card p-3 mb-3">
                <input type="radio" id="debito-falabella" name="payment" class="form-check-input me-2" onclick="habilitarBoton()">
                <label for="debito-falabella" class="form-check-label">Débito Banco Falabella</label>
            </div>
            <div class="card p-3 mb-3">
                <input type="radio" id="tarjeta-debito" name="payment" class="form-check-input me-2" onclick="habilitarBoton()">
                <label for="tarjeta-debito" class="form-check-label">Tarjeta de débito</label>
            </div>
        </div>

        <!-- Resumen de compra -->
        <div class="col-md-4">
            <h5 class="mb-3">Resumen de la compra</h5>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between">
                    <span>Productos (1)</span>
                    <strong>S/ 1,599</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Descuentos (1)</span>
                    <strong class="text-danger">- S/ 400</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Entregas (1)</span>
                    <strong>S/ 99</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total</span>
                    <strong>S/ 1,298</strong>
                </li>
            </ul>
            <button class="btn btn-primary w-100 mb-3" id="btnContinuar" disabled onclick="realizarCompra()">Continuar</button>
            <button class="btn btn-outline-secondary w-100 mb-3">¿Necesitas factura?</button>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="terms-cmr">
                <label for="terms-cmr" class="form-check-label">
                    Acepto los <a href="#">términos y condiciones</a> para acceder al programa CMR puntos.
                </label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="terms-privacy" onchange="habilitarBoton()">
                <label for="terms-privacy" class="form-check-label">
                    Declaro que he leído y aceptado los <a href="#">términos y condiciones</a> y autorizo la <a
                        href="#">política de privacidad</a>.
                </label>
            </div>
        </div>
    </div>
</div>

<script>
    // Función para habilitar o deshabilitar el botón de continuar
    function habilitarBoton() {
        const termsChecked = document.getElementById('terms-privacy').checked;
        const paymentSelected = document.querySelector('input[name="payment"]:checked');
        const btnContinuar = document.getElementById('btnContinuar');
        
        if (termsChecked && paymentSelected) {
            btnContinuar.disabled = false;
        } else {
            btnContinuar.disabled = true;
        }
    }

    // Función para manejar el click en el botón de "Continuar"
    // Función para manejar el click en el botón de "Continuar"
function realizarCompra() {
    // Mostrar una alerta
    alert("¡Compra realizada correctamente!");

    // Redirigir al home (inicio) de la aplicación
    window.location.href = "{{ route('home.index') }}";  // Laravel usa el helper `route()` para generar la URL
}

</script>

@endsection
