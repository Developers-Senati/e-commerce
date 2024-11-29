@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Carrito ({{ count($productos) }} productos)</h2>

        <div class="carrito-container">
            <!-- Lista de Productos -->
            <div class="productos-container">
                @foreach($productos as $producto)
                    <div class="producto-item">
                        <img src="{{ $producto->producto->imagen }}" alt="Producto">
                        <div class="producto-info">
                            <h5>{{ $producto->producto->nombre }}</h5>
                            <p><strong>{{ $producto->producto->descripcion }}</strong></p>
                            <p class="descuento">-40%</p>
                            <p class="precio">S/ {{ number_format($producto->producto->precio, 2) }} 
                                <span class="precio-original">S/ {{ number_format($producto->producto->precio * 1.67, 2) }}</span>
                            </p>
                        </div>
                        <div class="cantidad">
                            <form action="{{ route('carrito.actualizar', $producto->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-outline-secondary">-</button>
                                <input type="number" name="cantidad" value="{{ $producto->cantidad }}" min="1" class="form-control text-center" style="width: 60px;">
                                <button type="submit" class="btn btn-outline-secondary">+</button>
                            </form>
                        </div>
                        <form action="{{ route('carrito.destroy', $producto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <!-- Resumen del pedido -->
            <div class="resumen-container">
                <h4>Resumen de la orden</h4>
                <p><strong>Productos ({{ count($productos) }})</strong></p>
                <p class="total">
                    Total: S/ 
                    {{ number_format($productos->sum(function($producto) { 
                        return $producto->producto->precio * $producto->cantidad; 
                    }), 2) }}
                </p>
                <form action="{{ route('carrito.procesar') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-continuar-compra">Continuar compra</button>
                </form>
            </div>
        </div>

        <footer>
            <div class="alert alert-info">
                ¡Ahora puedes pagar tus compras con Yape!
            </div>
        </footer>
    </div>
@endsection
