<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceso de Entrega</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
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

        .delivery-container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .delivery-option {
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: background-color 0.2s;
            cursor: pointer;
        }

        .delivery-option:hover {
            background-color: #f8f9fa;
        }

        .delivery-option.disabled {
            background-color: #f5f5f5;
            color: #bbb;
            cursor: not-allowed;
        }

        .delivery-option.disabled:hover {
            background-color: #f5f5f5;
        }

        .delivery-icon {
            font-size: 24px;
            color: #6c757d;
            margin-right: 15px;
        }

        .delivery-text {
            flex: 1;
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
            <div class="progress-bar-custom"></div>
            <div class="progress-step">3<br>Pago</div>
        </div>

        <!-- Paso 2: Entrega -->
        <div class="delivery-container mt-4">
            <h5 class="mb-4">Elige un tipo de entrega</h5>
            <div class="delivery-option disabled">
                <div class="delivery-text">
                    <strong>Retira tu pedido</strong>
                    <p class="text-muted mb-0">No disponible <a href="#" class="text-decoration-none">¿Por qué?</a></p>
                </div>
            </div>
            <div class="delivery-option" data-bs-toggle="modal" data-bs-target="#modalDomicilio">
                <div class="delivery-icon">🚀</div>
                <div class="delivery-text">
                    <strong>Envío Express</strong>
                    <p class="text-muted mb-0">Ingresa tu dirección para continuar</p>
                </div>
            </div>
            <div class="delivery-option" data-bs-toggle="modal" data-bs-target="#modalDomicilio">
                <div class="delivery-icon">📅</div>
                <div class="delivery-text">
                    <strong>Envío en fecha programada</strong>
                    <p class="text-muted mb-0">Ingresa tu dirección para continuar</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalDomicilio" tabindex="-1" role="dialog" aria-labelledby="modalDomicilioLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDomicilioLabel">Datos de Envío a Domicilio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
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
                            <input type="text" class="form-control" id="direccion" name="direccion"
                                placeholder="Ingresa tu dirección" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono"
                                placeholder="Ingresa tu teléfono" required>
                        </div>
                        <div class="mb-3">
                            <label for="instrucciones" class="form-label">Instrucciones adicionales</label>
                            <textarea class="form-control" id="instrucciones" name="instrucciones"
                                placeholder="Ejemplo: Timbre malogrado"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <a href="{{route('proceso-pago.index')}}" class="btn btn-con btn-primary text-white">Continuar a Pago</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>