<?php

namespace App\Http\Controllers;

use App\Models\DashboardUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = DB::select('CALL sp_ProductoStock()');
        $tiposUsuarios = DB::select('CALL sp_DistribucionTiposUsuarios()');
        $estadosUsuarios = DB::select('CALL sp_EstadoUsuarios()');
        $productosCategoria = DB::select('CALL sp_ProductosPorCategoria()');
        $ingresosVentas = DB::select('CALL sp_IngresosPorVentas()');
        $metodosPago = DB::select('CALL sp_MetodosPago()');
        $estadosPedidos = DB::select('CALL sp_EstadoPedidos()');
        $tiemposEntrega = DB::select('CALL sp_TiemposEntrega()');
        $resumenVentasPedidos = DB::select('CALL sp_ResumenVentasYPedidos()');

        // Convertir el resultado a una colección de Laravel
        $productos = collect($productos);
        $tiposUsuarios = collect($tiposUsuarios);
        $estadosUsuarios = collect($estadosUsuarios);
        $productosCategoria = collect($productosCategoria);
        $ingresosVentas = collect($ingresosVentas);
        $metodosPago = collect($metodosPago);
        $estadosPedidos = collect($estadosPedidos);
        $tiemposEntrega = collect($tiemposEntrega);
        $resumenVentasPedidos = collect($resumenVentasPedidos);

        // Pasar los resultados a la vista para generar el gráfico
        return view('usuarios/funciones-usuario/dashboard', compact(
            'productos',
            'tiposUsuarios',
            'estadosUsuarios',
            'productosCategoria',
            'ingresosVentas',
            'metodosPago',
            'estadosPedidos',
            'tiemposEntrega',
            'resumenVentasPedidos'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DashboardUser $dashboardUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DashboardUser $dashboardUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DashboardUser $dashboardUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DashboardUser $dashboardUser)
    {
        //
    }
}
