<?php

namespace App\Http\Controllers;

use App\Models\Envios;
use App\Models\Pedidos;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoProductosController extends Controller
{
    /**
     * Mostrar el carrito de compras.
     */
    public function index()
    {
        // Mostrar la vista del carrito de compras
        return view('productos/producto/carrito-compras/vista-carrito');
    }

    public function realizar_compra(Request $request)
    {
        // Recuperar los productos y el total de la compra desde el formulario
        $productos = json_decode($request->input('productos'), true);
        $total = $request->input('total');

        // Crear el pedido
        $pedido = Pedidos::create([
            'id_usuario' => Auth::id(),
            'id_estado_pedido' => 2, // "Pagado"
            'fecha_pedido' => now(),
            'total' => $total,
        ]);

        // Reducir el stock de los productos
        foreach ($productos as $producto) {
            $productoModel = Productos::find($producto['id']);
            if ($productoModel) {
                $productoModel->stock -= $producto['cantidad']; // Reducir el stock
                $productoModel->save();
            }
            // Aquí puedes guardar la relación del producto con el pedido si es necesario
            $pedido->productos()->attach($producto['id'], ['cantidad' => $producto['cantidad']]);
        }
        session()->forget('carrito'); 

        // Redirigir al home
        return redirect()->route('home.index');
    }

    /**
     * Procesar la información del carrito y mostrar la vista de proceso de compra.
     */
    public function proceso_compra(Request $request)
{
    // Guardar los productos del carrito en la tabla 'pedidos'
    $productos = json_decode($request->input('productos'), true); // Decodifica el JSON a un array
    $total = $request->input('total');

    // Crear un nuevo pedido
    $pedido = Pedidos::create([
        'id_usuario' => Auth::id(), // Usuario autenticado
        'id_estado_pedido' => 1,    // Estado inicial del pedido (1 = "En proceso")
        'fecha_pedido' => now(),
        'total' => $total,
    ]);

    // Guardar cada producto en el pedido (usualmente necesitarías una relación pivot para productos)
    foreach ($productos as $producto) {
        // Aquí usamos 'id' en lugar de 'id_producto'
        $pedido->productos()->attach($producto['id'], ['cantidad' => $producto['cantidad']]);
    }

    // Verificar que el pedido se haya creado correctamente y redirigir con el ID correcto
    if ($pedido && $pedido->id) {
        return redirect()->route('proceso-entrega.index', ['id_pedido' => $pedido->id]);
    } else {
        return redirect()->back()->with('error', 'Error al procesar el pedido. Inténtalo de nuevo.');
    }
}



    /**
     * Mostrar la vista del proceso de entrega.
     */
    public function proceso_entrega($id_pedido)
    {
        return view('productos/producto/carrito-compras/proceso-entrega', ['id_pedido' => $id_pedido]);
    }

    /**
     * Procesar los datos de entrega y pasar al proceso de pago.
     */
    public function guardar_envio(Request $request)
{
    // Obtener el id_pedido desde el request
    $id_pedido = $request->input('id_pedido');

    // Verifica si el id_pedido existe
    if (!$id_pedido) {
        return redirect()->back()->with('error', 'El id del pedido no se ha recibido correctamente.');
    }

    // Crear el envío con los datos del formulario
    $envio = Envios::create([
        'id_pedido' => $id_pedido,  // Guardar el id del pedido
        'departamento' => $request->input('departamento'),
        'provincia' => $request->input('provincia'),
        'distrito' => $request->input('distrito'),
        'direccion' => $request->input('direccion'),
        'telefono' => $request->input('telefono'),
        'instrucciones' => $request->input('instrucciones'),
    ]);

    // Redirigir a la vista de proceso de pago
    return redirect()->route('proceso-pago.index', ['id_pedido' => $id_pedido]);
}


    /**
     * Mostrar la vista de proceso de pago.
     */
    public function proceso_pago($id_pedido)
{
    // Lógica del proceso de pago
    return view('productos/producto/carrito-compras/proceso-pago', ['id_pedido' => $id_pedido]);
}


    /**
     * Confirmar el pago y finalizar el proceso.
     */
    public function confirmar_pago(Request $request)
    {
        $id_pedido = $request->input('id_pedido');

        // Actualizar el estado del pedido a "Pagado"
        $pedido = Pedidos::find($id_pedido);
        $pedido->update([
            'id_estado_pedido' => 2, // Estado "Pagado"
        ]);

        // Redirigir a la página de confirmación o agradecimiento
        return redirect()->route('confirmacion-pago.index');
    }
}
