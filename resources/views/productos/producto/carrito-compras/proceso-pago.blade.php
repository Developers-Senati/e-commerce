<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paso 3 - Pago</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .step {
            width: 50px;
            height: 50px;
            border: 2px solid #ddd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 10px;
        }

        .step-number {
            font-weight: bold;
        }

        .active-step {
            border-color: #007bff;
            color: #007bff;
        }

        .card.disabled {
            background-color: #f8f9fa;
            pointer-events: none;
            opacity: 0.6;
        }

        .progress-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }

        .progress-step {
            font-size: 14px;
            font-weight: bold;
            color: #6c757d;
            text-align: center;
            flex: 1;
        }

        .progress-step.active {
            color: #000;
        }

        .progress-bar-custom {
            height: 4px;
            background-color: #ddd;
            position: relative;
            flex: 4;
        }

        .progress-bar-fill {
            height: 4px;
            width: 100%;
            background-color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <!-- Barra de progreso -->
        <div class="progress-container mt-5">
            <div class="progress-step active">1<br>Carro</div>
            <div class="progress-bar-custom">
                <div class="progress-bar-fill"></div>
            </div>
            <div class="progress-step active">2<br>Entrega</div>
            <div class="progress-bar-custom">
                <div class="progress-bar-fill"></div>
            </div>
            <div class="progress-step active">3<br>Pago</div>
        </div>

        <div class="row">
            <!-- Formulario de pago -->
            <div class="col-md-8">
                <h5 class="mb-3">Método de Pago</h5>
                <div class="card p-3 mb-3">
                    <input type="radio" id="tarjeta-cmr" name="payment" class="form-check-input me-2">
                    <label for="tarjeta-cmr" class="form-check-label">Tarjeta CMR</label>
                </div>
                <div class="card p-3 mb-3">
                    <input type="radio" id="tarjeta-credito" name="payment" class="form-check-input me-2">
                    <label for="tarjeta-credito" class="form-check-label">Tarjeta de crédito</label>
                </div>
                <div class="card p-3 mb-3">
                    <input type="radio" id="debito-falabella" name="payment" class="form-check-input me-2">
                    <label for="debito-falabella" class="form-check-label">Débito Banco Falabella</label>
                </div>
                <div class="card p-3 mb-3">
                    <input type="radio" id="tarjeta-debito" name="payment" class="form-check-input me-2">
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
                <button class="btn btn-primary w-100 mb-3" disabled>Continuar</button>
                <button class="btn btn-outline-secondary w-100 mb-3">¿Necesitas factura?</button>
                <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" id="terms-cmr">
                    <label for="terms-cmr" class="form-check-label">
                        Acepto los <a href="#">términos y condiciones</a> para acceder al programa CMR puntos.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="terms-privacy">
                    <label for="terms-privacy" class="form-check-label">
                        Declaro que he leído y aceptado los <a href="#">términos y condiciones</a> y autorizo la <a
                            href="#">política de privacidad</a>.
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>