<!-- resources/views/productos/detalleprod.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $producto->nombre_producto }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        .breadcrumb-item a {
            color: #333;
        }

        .img-thumbnails img {
            width: 50%;
            margin-bottom: 5px;
        }

        .position-relative .discount {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 1.2em;
            background-color: #ff9900;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .price {
            font-size: 1.8em;
            font-weight: bold;
            color: #007bff;
        }

        .original-price {
            text-decoration: line-through;
            color: gray;
            font-size: 0.7em;
        }

        .quantity-section input {
            text-align: center;
        }

        .shipping-options p {
            font-size: 0.9em;
        }

        .shipping-options a {
            color: #007bff;
            text-decoration: underline;
        }

        .move-left {
            margin-left: -70px;
        }

        .text-font {
            font-size: 12px;
            margin: 0px;
        }

        #icon-recojo {
            padding: 0px 10px;
            display: grid;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <header>
        @include('layout.navbar')
    </header>

    <div class="container mt-5">
        <!-- Breadcrumb de navegación -->
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('productos.index') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $producto->nombre_producto }}</li>
            </ul>
        </nav>

        <div class="row">
            <div class="col-2">

            </div>
            <!-- Columna de la imagen del producto -->
            <div class="col-4 text-center move-left">
                <div class="position-relative">
                    <!-- Imagen principal del producto -->
                    <img src="{{ route('productos-user.image', $producto->id_producto) }}" class="img-fluid" alt="Imagen del producto">

                    <!-- Descuento, si aplica -->
                    @if($producto->stock > 10)
                    <div class="badge bg-primary discount">-10%</div>
                    @endif
                </div>
            </div>

            <!-- Detalles del producto -->
            <div class="col-6">
                <div class="row">
                    <p class="text-font">SKU:{{ $producto->id_producto }}</p>
                </div>

                <div class="row">
                    <h4>{{ $producto->nombre_producto }}</h4>
                </div>

                <div class="row">
                    <!-- Calificacion -->
                </div>

                <div class="row">
                    <!-- Precio del producto con descuento si aplica -->
                    <h4 class="price">S/ {{ number_format($producto->precio, 2) }}
                        @if($producto->stock > 10)
                        <span class="original-price">S/ {{ number_format($producto->precio * 1.1, 2) }}</span>
                        @endif
                    </h4>
                </div>

                <div class="row">
                    <!-- Colores -->
                </div>

                <!-- Sección para cantidad y agregar al carrito -->
                <div class="row">
                    <div class="col-3 mb-3">
                        <div class="input-group">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon1">
                                <span class="fas fa-minus"></span>
                            </button>
                            <input type="number" value="1" min="1" class="form-control text-center" id="cantidad" />
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                                <span class="fas fa-plus"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-9">
                        <button class="btn btn-outline-dark agregar-carrito" data-id="{{ $producto->id_producto }}" data-nombre="{{ $producto->nombre_producto }}" data-precio="{{ $producto->precio }}" data-imagen="{{ route('productos-user.image', $producto->id_producto) }}">
                            Agregar al carrito
                        </button>
                    </div>
                </div>

                <div class="row">
                    <p class="text-font">Unidades disponibles: {{ $producto->stock }}</p>
                </div>

                <hr>
                <!-- Opciones de envío -->
                <div class="row d-flex justify-content-around">
                    <div class="col-4 d-flex align-items-center">
                        <span id="icon-recojo" class="fas fa-motorcycle fs-3"></span>
                        <div>
                            <p class="text-font">Envio Hoy (Recibe Hoy)</p>
                            <a class="text-font" href="#">No disponible</a>
                        </div>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <span id="icon-recojo" class="fas fa-truck fs-3"></span>
                        <div>
                            <p class="text-font">Envio programado</p>
                            <a class="text-font" href="#">No disponible</a>
                        </div>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <span id="icon-recojo" class="fas fa-store fs-3"></span>
                        <div>
                            <p class="text-font">Retiro en tienda</p>
                            <a class="text-font" href="#">No disponible</a>
                        </div>
                    </div>
                </div>

                <hr>
            </div>
        </div>
    </div>

    <script>
        const agregarCarritoBtns = document.querySelectorAll('.agregar-carrito');
        agregarCarritoBtns.forEach(btn => {
            btn.addEventListener('click', comprarProducto);
        });

        function comprarProducto(e) {
            e.preventDefault();
            const producto = e.target;
            const cantidad = document.getElementById('cantidad').value;
            leerDatosProducto(producto, cantidad);
        }

        function leerDatosProducto(producto, cantidad) {
            const infoProducto = {
                imagen: producto.getAttribute('data-imagen'),
                titulo: producto.getAttribute('data-nombre'),
                precio: producto.getAttribute('data-precio'),
                id: producto.getAttribute('data-id'),
                cantidad: cantidad
            };

            insertarProducto(infoProducto);
        }

        function insertarProducto(producto) {
            const row = document.createElement('tr');
            row.innerHTML = `
    <td><img src="${producto.imagen}" width="50"></td>
    <td>${producto.titulo}</td>
    <td>${producto.precio}</td>
    <td>${producto.cantidad}</td>
    <td style="text-align:center;">
        <a href="#" class="borrar-producto" data-id="${producto.id}">
            <span class="fas fa-xmark"></span>
        </a>
    </td>
`;
            listaProductos.appendChild(row);
            guardarProductoLocalStorage(producto);
            actualizarTotal();
        }
    </script>


    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>