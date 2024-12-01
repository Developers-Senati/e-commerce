<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarritoProductosController extends Controller
{
    /**
     * Mostrar el carrito de compras.
     */
    public function index()
    {
        // Obtener los productos del carrito del usuario autenticado usando la relación
        return view('productos/producto/carrito-compras/vista-carrito');
    }

    public function create()
    {
        //
    }

    /**
     * Agregar un producto al carrito.
     */
    public function store(Request $request)
    {

    }

    /**
     * Actualizar la cantidad de un producto en el carrito.
     */
    public function show(Request $request)
    {
        //
    }

    public function edit(Request $request)
    {
        //
    }


    public function update(Request $request, $id)
    {

    }
    /**
     * Eliminar un producto del carrito.
     */
    public function destroy($id)
    {

    }

    public function proceso_compra()
    {
        return view('productos/producto/carrito-compras/proceso-compra');
    }

    public function proceso_entrega()
    {
        return view('productos/producto/carrito-compras/proceso-entrega');
    }

    public function proceso_pago()
    {
        return view('productos/producto/carrito-compras/proceso-pago');
    }
}
