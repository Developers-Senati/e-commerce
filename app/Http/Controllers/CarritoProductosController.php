<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoProductosController extends Controller
{
    /**
     * Mostrar el carrito de compras.
     */
    public function index()
    {
        // Obtener los productos del carrito del usuario autenticado usando la relación
        $productos = auth()->user()->productosCarrito;

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

        // Obtener el producto
        $productoModel = Producto::find($producto['id']);

        // Verificar si el producto ya está en el carrito
        $carritoProducto = auth()->user()->productosCarrito()->where('producto_id', $producto['id'])->first();

        if ($carritoProducto) {
            // Si el producto ya está en el carrito, actualizar la cantidad
            auth()->user()->productosCarrito()->updateExistingPivot($producto['id'], [
                'cantidad' => $carritoProducto->pivot->cantidad + $producto['cantidad']
            ]);
        } else {
            // Si no está en el carrito, agregarlo
            auth()->user()->productosCarrito()->attach($producto['id'], [
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

        // Actualizar la cantidad del producto en el carrito
        $carritoProducto = auth()->user()->productosCarrito()->where('producto_id', $id)->first();
        
        if ($carritoProducto) {
            auth()->user()->productosCarrito()->updateExistingPivot($id, [
                'cantidad' => $request->cantidad
            ]);
        }

        return redirect()->route('carrito.ver');
    }

    /**
     * Eliminar un producto del carrito.
     */
    public function destroy($id)
    {
        // Eliminar el producto del carrito del usuario autenticado
        auth()->user()->productosCarrito()->detach($id);

        return redirect()->route('carrito.ver');
    }

    /**
     * Vaciar el carrito.
     */
    public function vaciarCarrito()
    {
        auth()->user()->productosCarrito()->detach();

        return redirect()->route('carrito.ver');
    }

    /**
     * Procesar la compra.
     */
    public function procesarCompra()
    {
        // Aquí puedes agregar la lógica para procesar la compra (como una orden de pago)
        // Eliminar los productos del carrito después de la compra
        auth()->user()->productosCarrito()->detach();

        return redirect()->route('home')->with('message', '¡Compra procesada con éxito!');
    }
}
