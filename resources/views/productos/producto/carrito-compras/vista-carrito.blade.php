@extends('layout/navbar')

@section("TituloPagina", "Productos")

@section('contenido')

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
            <a href="{{route('proceso-compra.index')}}" class="btn btn-continuar-compra btn-secondary">Continuar
                compra</a>
        </div>
    </div>
</div>

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
                        <p class="mb-0">
                            <span class="precio">S/ ${parseFloat(producto.precio).toFixed(2)}</span>
                            <span class="precio-original">${producto.precioOriginal || ''}</span>
                        </p>
                        <span class="alert-stock">${producto.alertStock || ''}</span>
                    </div>
                    <div class="cantidad">
                        <div class="input-group input-group-sm">
                            <button type="button" class="btn btn-outline-secondary">-</button>
                            <input type="number" value="${producto.cantidad}" min="1" class="form-control">
                            <button type="button" class="btn btn-outline-secondary">+</button>
                        </div>      
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

@endsection