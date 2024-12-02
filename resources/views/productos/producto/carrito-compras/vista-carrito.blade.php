<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carrito-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .productos-container {
            flex: 1;
            max-width: 65%;
        }

        .producto-item {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            background-color: white;
            font-size: 14px;
        }

        .producto-item img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-right: 15px;
        }

        .producto-info h5 {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .producto-info .marca {
            font-size: 12px;
            color: #666;
        }

        .producto-info .vendedor {
            font-size: 12px;
            color: #999;
        }

        .producto-info .descuento {
            color: white;
            background-color: #dc3545;
            font-weight: bold;
            padding: 2px 5px;
            border-radius: 4px;
            font-size: 12px;
            margin-left: 10px;
        }

        .producto-info .precio {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .producto-info .precio-original {
            font-size: 14px;
            text-decoration: line-through;
            color: #999;
            margin-left: 10px;
        }

        .alert-stock {
            font-size: 12px;
            background-color: #ffecec;
            color: #e60000;
            padding: 2px 5px;
            border-radius: 4px;
            display: inline-block;
            margin-top: 5px;
        }

        .cantidad {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-left: auto;
        }

        .cantidad button {
            padding: 0 8px;
        }

        .cantidad input {
            width: 40px;
            text-align: center;
            border-radius: 4px;
        }

        .max-unidad {
            font-size: 12px;
            color: #e60000;
            margin-top: 5px;
        }

        .resumen-container {
            flex: 1;
            max-width: 30%;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 15px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .resumen-container h4 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .btn-continuar-compra {
            width: 100%;
            background-color: #686767;
            color: white;
            border-radius: 20px;
        }

        .alert-info {
            text-align: center;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Carrito</h2>
        <br>
        <div class="carrito-container">
            <!-- Lista de Productos -->
            <div class="productos-container" id="productos-carrito">
                <!-- Aquí se insertarán los productos dinámicamente -->
            </div>

            <!-- Resumen del pedido -->
            <div class="resumen-container">
                <h4>Resumen de la orden</h4>
                <p><strong>Productos (1)</strong>: <span id="total-carrito">S/ 0.00</span></p>
                <hr>
                <p><strong>Descuento:</strong> <span class="text-danger">-S/ 0.00</span></p>
                <hr>
                <p class="total">Total: <span id="total">S/ 0.00</span></p>
                <a href="{{route('proceso-compra.index')}}" class="btn btn-continuar-compra btn-secondary">Continuar compra</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Función para obtener los productos del LocalStorage
        function obtenerProductosLocalStorage() {
            let productosLS = localStorage.getItem('productos');
            return productosLS ? JSON.parse(productosLS) : [];
        }

        // Función para mostrar los productos en el carrito
        function mostrarProductosCarrito() {
            const productos = obtenerProductosLocalStorage();
            const contenedor = document.getElementById('productos-carrito');
            contenedor.innerHTML = ''; // Limpiar el contenedor antes de mostrar los nuevos productos
            let total = 0;

            productos.forEach(producto => {
                const productoDiv = document.createElement('div');
                productoDiv.classList.add('producto-item');
                productoDiv.innerHTML = `
                    <input type="checkbox" class="form-check-input me-3" checked>
                    <img src="${producto.imagen}" alt="${producto.titulo}">
                    <div class="producto-info">
                        <h5>${producto.titulo}</h5>
                        <p class="marca">Marca: ${producto.marca || 'No disponible'}</p>
                        <p class="vendedor">Vendido por: ${producto.vendedor || 'No disponible'}</p>
                        <p>
                            <span class="precio">S/ ${producto.precio}</span>
                            <span class="precio-original">${producto.precioOriginal || ''}</span>
                        </p>
                        <span class="alert-stock">${producto.alertStock || ''}</span>
                    </div>
                    <div class="cantidad">
                        <button type="button" class="btn btn-outline-secondary btn-sm">-</button>
                        <input type="number" value="${producto.cantidad}" min="1" class="form-control">
                        <button type="button" class="btn btn-outline-secondary btn-sm">+</button>
                    </div>
                    <p class="max-unidad">Máx ${producto.maxUnidad || 1} unidad</p>
                `;
                contenedor.appendChild(productoDiv);

                total += parseFloat(producto.precio.replace('S/', '').replace('$', '')) * producto.cantidad;
            });

            // Actualizar total
            document.getElementById('total').textContent = `S/ ${total.toFixed(2)}`;
        }

        // Llamar la función cuando se carga la página
        document.addEventListener('DOMContentLoaded', mostrarProductosCarrito);
    </script>
</body>

</html>
