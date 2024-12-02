<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceso de Compra</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
            margin-bottom: 20px;
        }

        .logo-container img {
            height: 50px;
        }

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


        .card-container {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .btn-con {
            color: #6c757d;
            border-radius: 20px;
            width: 100%;
            font-weight: bold;
        }

        .btn-continue:disabled {
            background-color: #e0e0e0;
            color: #a1a1a1;
        }

        .small-text {
            font-size: 12px;
            color: #888;
            text-align: center;
            margin-top: 15px;
        }

        input[type="email"] {
            border-radius: 10px;
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
            width: 0%;
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
            <div class="progress-step">2<br>Entrega</div>
            <div class="progress-bar-custom"></div>
            <div class="progress-step">3<br>Pago</div>
        </div>

        <!-- Formulario -->
        <div class="card-container mt-5">
            <h5 class="text-start">Ingresa tu correo electrónico para continuar</h5>
            <p class="text-muted text-center">
                Tu cuenta de email es la misma <br> Úsala si ya estás registrado.
            </p>
            <form>
                <div class="mb-4">
                    <label for="email" class="form-label">Correo electrónico:</label>
                    <input type="email" class="form-control" id="email" placeholder="Ingresa correo electrónico"
                        required>
                </div>
                <a href="{{route('proceso-entrega.index')}}" class="btn btn-con btn-dark text-white">Continuar</a>
            </form>
            <p class="small-text">¿Necesitas ayuda? Llámanos al 203-7064</p>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Activar el botón "Continuar" solo si el email es válido
        const emailInput = document.getElementById('email');
        const continueButton = document.querySelector('.btn-continue');

        emailInput.addEventListener('input', function () {
            if (emailInput.value.trim() !== '') {
                continueButton.disabled = false;
            } else {
                continueButton.disabled = true;
            }
        });
    </script>
</body>

</html>