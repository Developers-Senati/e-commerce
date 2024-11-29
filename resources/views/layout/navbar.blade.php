<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('TituloPagina')</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script defer src="{{ asset('js/jquery.min.js') }}"></script>
    <script defer src="{{ asset('js/popper.js') }}"></script>
    <script defer src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script defer src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script defer src="{{ asset('js/dropdown.js') }}"></script>

</head>

<body>

    <!-- Navegación -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light container">
            <a class="navbar-brand text-light" href="{{route('home.index')}}">
                <img class="logo" src="{{ asset('img/logo-e-commerce.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-2">
                        <a class="nav-link" href="{{route('productos.index')}}">Catalogo</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link" href="{{route('usuarios.index')}}">Usuarios</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <span class="position-absolute fas fa-magnifying-glass ps-2"></span>
                    <input type="text" id="searchNavbar" class="form-control" placeholder="Buscar">
                </div>

                @if(session()->has('usuario'))
                <div class="dropdown custom-dropdown">
                    <a href="#" data-toggle="dropdown"
                        class="btn btn-outline-light ms-2 d-flex align-items-center dropdown-link text-left"
                        aria-haspopup="true" aria-expanded="false" data-offset="0, 20">
                        {{ substr(session('usuario.nombres'), 0, 1) }}{{ substr(session('usuario.apellido_materno'), 0, 1) }}
                        <span class="fas fa-caret-down ms-2"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('perfil.index') }}"><span
                                class="fas fa-user"></span>Perfil</a>
                        <a class="dropdown-item" href="{{ route('logout.logout') }}"><span
                                class="fas fa-door-open"></span>Log out</a>
                    </div>
                </div>
                @else
                <a href="{{ route('login.index') }}" class="btn btn-outline-light ms-2">
                    <span class="fa-regular fa-user"></span>
                </a>
                @endif

                <a href="{{route('registro.index')}}" class="btn btn-outline-light ms-2">
                    <span class="fa-solid fa-address-card"></span>
                </a>

                <!-- Botón del carrito -->
                <button class="btn btn-outline-light ms-2" id="mostrar-carrito">
                    <span class="fas fa-cart-shopping"></span>
                    <span id="numero-productos" class="badge bg-danger ms-2">0</span>
                </button>

                <!-- Carrito de compras -->
                <div id="container" style="position: relative; display: flex; flex-direction: column; align-items: center;">
                    <div id="carrito-contenido" class="carrito-contenido mt-4"
                        style="display: none; position: absolute; background: #fff; border: 1px solid #ccc; padding: 10px; top: 30%; right: 0; margin-top: 10px; z-index: 100;">
                        <h4>Carrito de Compras</h4>
                        <table id="lista-carrito" style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Imagen</th>
                                    <th style="text-align: center;">Nombre</th>
                                    <th style="text-align: center;">Precio</th>
                                    <th style="text-align: center;">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <p>Total: $<span id="total-carrito">0.00</span></p>
                        <div class="d-flex justify-content-around">
                            <button id="vaciar-carrito" class="btn btn-outline-danger btn-sm">
                                <span class="fas fa-trash-can me-2"></span>Vaciar Carrito
                            </button>

                            <a href="{{route('carrito.ver')}}" class="btn btn-outline-success btn-sm ms-2">
                                <span class="fa-solid fa-cart-arrow-down me-2"></span>Ver carrito
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('contenido')
    </main>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const botones = document.querySelectorAll('.btn');

            // Aplica el efecto a cada botón
            botones.forEach(boton => {
                const icono = boton.querySelector('span');

                boton.addEventListener('mouseenter', () => {
                    icono.classList.add('fa-bounce');
                });

                boton.addEventListener('mouseleave', () => {
                    icono.classList.remove('fa-bounce');
                });
            });
        });
    </script>

    <script>
        const carrito = document.getElementById('carrito-contenido');
        const listaProductos = document.querySelector('#lista-carrito tbody');
        const mostrarCarritoBtn = document.getElementById('mostrar-carrito');
        const vaciarCarritoBtn = document.querySelector('#vaciar-carrito');
        const numeroProductos = document.getElementById('numero-productos'); // El elemento para mostrar el número de productos

        eventsListeners();

        function eventsListeners() {
            // Escucha el click en el botón de agregar al carrito
            const agregarCarritoBtns = document.querySelectorAll('.agregar-carrito');
            agregarCarritoBtns.forEach(btn => {
                btn.addEventListener('click', comprarProducto);
            });

            mostrarCarritoBtn.addEventListener('click', mostrarCarrito); // Mostrar carrito al hacer clic
            listaProductos.addEventListener('click', eliminarProducto);
            document.addEventListener('DOMContentLoaded', leerLS);
            vaciarCarritoBtn.addEventListener('click', vaciarCarrito);

            // Cerrar carrito si se hace clic fuera de él
            document.addEventListener('click', (e) => {
                if (!carrito.contains(e.target) && e.target !== mostrarCarritoBtn) {
                    carrito.style.display = 'none';
                }
            });

            // Evitar que el carrito se cierre cuando se hace clic dentro de su área
            carrito.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        }

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
            actualizarNumeroProductos(); // Actualiza el número de productos después de agregar
        }

        function mostrarCarrito(e) {
            e.stopPropagation(); // Evitar que el clic se propague al document
            carrito.style.display = (carrito.style.display === 'block') ? 'none' : 'block';
            leerLS();
            actualizarTotal();
        }

        function guardarProductoLocalStorage(producto) {
            let productos = obtenerProductosLocalStorage();
            productos.push(producto);
            localStorage.setItem('productos', JSON.stringify(productos));
        }

        function obtenerProductosLocalStorage() {
            let productosLS = localStorage.getItem('productos');
            return productosLS ? JSON.parse(productosLS) : [];
        }

        function leerLS() {
            let productosLS = obtenerProductosLocalStorage();
            listaProductos.innerHTML = '';
            productosLS.forEach(function(producto) {
                const row = document.createElement("tr");
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
            });
            actualizarTotal();
            actualizarNumeroProductos(); // Actualiza el número de productos al cargar el carrito
        }

        function eliminarProducto(e) {
            if (e.target.classList.contains('fa-xmark')) {
                const productoId = e.target.closest('a').getAttribute('data-id');
                e.target.closest('tr').remove();
                eliminarProductoLocalStorage(productoId);
                actualizarTotal();
                actualizarNumeroProductos(); // Actualiza el número de productos después de eliminar
            }
        }

        function eliminarProductoLocalStorage(id) {
            let productosLS = obtenerProductosLocalStorage();
            productosLS = productosLS.filter(producto => producto.id !== id);
            localStorage.setItem('productos', JSON.stringify(productosLS));
        }

        function vaciarCarrito() {
            listaProductos.innerHTML = '';
            localStorage.removeItem('productos');
            actualizarTotal();
            actualizarNumeroProductos(); // Actualiza el número de productos al vaciar el carrito
        }

        function actualizarTotal() {
            let productosLS = obtenerProductosLocalStorage();
            let total = 0;
            productosLS.forEach(producto => {
                total += parseFloat(producto.precio.replace('$', '')) * producto.cantidad;
            });
            document.getElementById('total-carrito').textContent = total.toFixed(2);
        }

        // Función para actualizar el número de productos en el carrito
        function actualizarNumeroProductos() {
            let productosLS = obtenerProductosLocalStorage();
            let cantidadTotal = productosLS.reduce((total, producto) => total + parseInt(producto.cantidad), 0);
            numeroProductos.textContent = cantidadTotal; // Actualiza el contador en tiempo real
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

</body>

</html>