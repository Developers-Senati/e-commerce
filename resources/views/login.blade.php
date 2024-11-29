<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Iniciar Sesión</title>

    <style>
        * {
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: 100vh;
            background-image: url('https://wallpapers.com/images/hd/e-commerce-1900-x-1118-wallpaper-r2k1ldol65vss423.jpg');
            background-position: center;
            background-size: cover;
        }

        .contenedor {
            position: relative;
            width: 400px;
            border: 2px solid rgba(255, 255, 255, .6);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            height: 450px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .contenedor h2 {
            font-size: 2.3rem;
            color: #fff;
            text-align: center;
        }

        .input-contenedor {
            position: relative;
            margin: 30px 0;
            width: 300px;
            border-bottom: 2px solid #fff;
        }

        input:-webkit-autofill {
            background-color: transparent !important;
            color: #fff !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        input:-webkit-autofill::first-line {
            color: #fff !important;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            color: #fff !important;
            -webkit-text-fill-color: #fff !important; /* Cambia el color de relleno del texto autocompletado */
            background-color: transparent !important;
        }

        .input-contenedor label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            color: #fff;
            font-size: 1rem;
            pointer-events: none;
            transition: .6s;
            font-weight: bold;
        }

        input:focus~label,
        input:valid~label {
            top: -5px;
        }

        .input-contenedor input {
            width: 100%;
            height: 50px;
            background-color: transparent;
            border: none;
            outline: none;
            font-size: 1rem;
            padding: - 35px 0 5px;
            color: #fff;
        }

        .input-contenedor i {
            position: absolute;
            color: #fff;
            font-size: 1.6rem;
            top: 19px;
            right: 8px;
        }

        .olvidar {
            margin: -15px 0 15px;
            font-size: .9em;
            color: #fff;
            display: flex;
            justify-content: center;
        }

        .olvidar label input {
            margin: 3px;
        }

        .olvidar label a {
            color: #fff;
            text-decoration: none;
            transition: .3s;
            font-size: .9em;
        }

        .olvidar label a:hover {
            text-decoration: underline;
        }

        button {
            width: 100%;
            height: 45px;
            border-radius: 40px;
            background: #fff;
            border: none;
            font-weight: bold;
            cursor: pointer;
            outline: none;
            font-size: 1rem;
            transition: .4s;
        }

        button:hover {
            opacity: .9;
        }

        .registrar {
            font-size: .8rem;
            color: #fff;
            text-align: center;
            margin: 20px 0 10px;
        }

        .registrar a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: .3s;
        }

        .registrar a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    @if (session('success'))    
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif

    <section>
        <div class="contenedor">
            <div class="formulario">
                <form action="{{route('login.show')}}" method="POST">
                    @csrf
                    <h2>Inicio Sesión</h2>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" name="usuario" required>
                        <label for="">Usuario</label>
                    </div>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="clave" required>
                        <label for="">Contraseña</label>
                    </div>

                    <div class="olvidar">
                        <label for="">
                            <a href="">Olvidé mi contraseña</a>
                        </label>
                    </div>

                    <button type="submit">Acceder</button>
                </form>
                <div>
                    <div class="registrar">
                        <a href="{{route('registro.index')}}">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>