@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Carrito ({{ count($productos) }} productos)</h2>

        <div class="carrito-container">
            <!-- Lista de Productos -->
            <div class="productos-container">
                @foreach($productos as $producto)
                    <div class="producto-item d-flex justify-content-between align-items-center mb-3 p-3 border rounded">
                        <!-- Imagen del producto -->
                        <div class="producto-imagen">
                            <img src="{{ $producto->producto->imagen }}" alt="{{ $producto->producto->nombre }}" class="img-fluid" style="max-width: 80px;">
                        </div>
                        
                        <!-- Información del producto -->
                        <div class="producto-info flex-grow-1 mx-3">
                            <h5>{{ $producto->producto->nombre }}</h5>
                            <p><strong>{{ $producto->producto->descripcion }}</strong></p>
                            <p class="descuento text-danger">-40%</p>
                            <p class="precio">S/ {{ number_format($producto->producto->precio, 2) }} 
                                <span class="precio-original text-muted">S/ {{ number_format($producto->producto->precio * 1.67, 2) }}</span>
                            </p>
                        </div>
                        
                        <!-- Sección de Cantidad -->
                        <div class="cantidad d-flex align-items-center">
                            <form action="{{ route('carrito.actualizar', $producto->id) }}" method="POST" class="d-flex">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-outline-secondary btn-sm">-</button>
                                <input type="number" name="cantidad" value="{{ $producto->cantidad }}" min="1" class="form-control text-center" style="width: 60px;">
                                <button type="submit" class="btn btn-outline-secondary btn-sm">+</button>
                            </form>
                        </div>
                        
                        <!-- Botón de eliminar producto -->
                        <div class="eliminar">
                            <form action="{{ route('carrito.destroy', $producto->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Resumen del pedido -->
            <div class="resumen-container p-3 border rounded">
                <h4>Resumen de la orden</h4>
                <p><strong>Productos ({{ count($productos) }})</strong></p>
                <p class="total">
                    <strong>Total: S/ </strong>
                    {{ number_format($productos->sum(function($producto) { 
                        return $producto->producto->precio * $producto->cantidad; 
                    }), 2) }}
                </p>
                <form action="{{ route('carrito.procesar') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success w-100">Continuar compra</button>
                </form>
            </div>
        </div>

        <footer>
            <div class="alert alert-info mt-4">
                ¡Ahora puedes pagar tus compras con Yape!
            </div>
        </footer>
    </div>
@endsection
