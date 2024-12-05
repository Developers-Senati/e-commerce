<?php

namespace App\Http\Controllers;

use App\Models\Envios;
use App\Models\Pedidos;
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
        // Obtener el pedido
        $id_pedido = $request->input('id_pedido');

        // Guardar los datos de envío en la tabla 'envios'
        $envio = Envios::create([
            'id_pedido' => $id_pedido,
            'departamento' => $request->input('departamento'),
            'provincia' => $request->input('provincia'),
            'distrito' => $request->input('distrito'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'instrucciones' => $request->input('instrucciones'),
        ]);

        // Redirigir a la vista de "Proceso de Pago"
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
