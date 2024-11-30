<?php

namespace App\Http\Controllers;

use App\Models\CarritoProductos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoProductosController extends Controller
{
    /**
     * Mostrar el carrito de compras.
     */
    public function index()
    {
        // Obtener el carrito del usuario autenticado
        $userId = Auth::id();
        $productos = CarritoProductos::where('id_usuario', $userId)->get();

        return view('vista-carrito', compact('productos'));
    }

    /**
     * Agregar un producto al carrito.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        
        // Validar que el producto exista
        $producto = $request->validate([
            'id' => 'required|integer|exists:productos,id',
            'cantidad' => 'required|integer|min:1'
        ]);

        // Verificar si el producto ya está en el carrito
        $carritoProducto = CarritoProductos::where('id_usuario', $userId)
                                            ->where('producto_id', $producto['id'])
                                            ->first();

        if ($carritoProducto) {
            // Si el producto ya está, actualizar la cantidad
            $carritoProducto->cantidad += $producto['cantidad'];
            $carritoProducto->save();
        } else {
            // Si no está en el carrito, agregarlo
            CarritoProductos::create([
                'id_usuario' => $userId,
                'producto_id' => $producto['id'],
                'cantidad' => $producto['cantidad']
            ]);
        }

        return redirect()->route('carrito.ver');
    }

    /**
     * Actualizar la cantidad de un producto en el carrito.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        $carritoProducto = CarritoProductos::find($id);
        if ($carritoProducto) {
            $carritoProducto->cantidad = $request->cantidad;
            $carritoProducto->save();
        }

        return redirect()->route('carrito.ver');
    }

    /**
     * Eliminar un producto del carrito.
     */
    public function destroy($id)
    {
        $carritoProducto = CarritoProductos::find($id);
        if ($carritoProducto) {
            $carritoProducto->delete();
        }

        return redirect()->route('carrito.ver');
    }

    /**
     * Vaciar el carrito.
     */
    public function vaciarCarrito()
    {
        $userId = Auth::id();
        CarritoProductos::where('id_usuario', $userId)->delete();

        return redirect()->route('carrito.ver');
    }

    /**
     * Procesar la compra.
     */
    public function procesarCompra()
    {
        // Aquí agregarías la lógica para procesar la compra (como una orden de pago)
        // Eliminar los productos del carrito después de la compra
        $userId = Auth::id();
        CarritoProductos::where('id_usuario', $userId)->delete();

        return redirect()->route('home')->with('message', '¡Compra procesada con éxito!');
    }
}
