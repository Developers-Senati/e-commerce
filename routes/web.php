<?php

use App\Http\Controllers\ReclamosController;

use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PerfilUserController;
use App\Http\Controllers\ProductosUserController;
use App\Http\Controllers\CarritoProductosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Home */

Route::get('/', [HomeController::class, 'index'])->name('home.index');

/* Log-in - Log-out */
Route::get('/log-in', [LoginController::class, 'index'])->name('login.index');
Route::post('/validar', [LoginController::class, 'show'])->name('login.show');
Route::get('/log-out', [LoginController::class, 'logout'])->name('logout.logout');

/* Registro */
Route::get('/registro', [RegistroController::class, 'index'])->name('registro.index');
Route::get('/registro-proveedor', [RegistroController::class, 'index_proveedor'])->name('registro-proveedor.index');

/*Productos */
Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
Route::get('/productos/{id}', [ProductosController::class, 'show'])->name('productos.show');
Route::post('/productos/destroy', [ProductosController::class, 'destroy'])->name('productos.destroy');

/* Productos User */
Route::post('/productos-user/update', [ProductosUserController::class, 'update'])->name('productos-user.update');
Route::post('/productos-user/store', [ProductosUserController::class, 'store'])->name('productos-user.store');
Route::get('/productos-user/imagen/{id_producto}', [ProductosUserController::class, 'image'])->name('productos-user.image');

Route::middleware('checkLogin')->group(function () {
    /* Usuarios */
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
    Route::post('/usuarios/store', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::post('/usuarios/{id_usuario}/update', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::post('/usuarios/destroy', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');

    /* Proveedores */
    Route::post('/proveedores/create', [UsuariosController::class, 'create'])->name('proveedores.create');

    /* Perfil */
    Route::get('/perfil', [PerfilUserController::class, 'index'])->name('perfil.index');
    Route::get('/mis-productos', [ProductosUserController::class, 'index'])->name('productos-user.index');
    Route::get('/dashboard', [DashboardUserController::class, 'index'])->name('dashboard.index');
    Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario.index');

});

/* Carrito de compras */
Route::get('/carrito-compras', [CarritoProductosController::class, 'index'])->name('carrito.index');
Route::post('/proceso-compra', [CarritoProductosController::class, 'proceso_compra'])->name('proceso-compra.index');
Route::get('/proceso-entrega/{id_pedido}', [CarritoProductosController::class, 'proceso_entrega'])->name('proceso-entrega.index');
Route::post('/guardar-envio', [CarritoProductosController::class, 'guardar_envio'])->name('guardar-envio');
Route::post('proceso-pago/{id_pedido}', [CarritoProductosController::class, 'proceso_pago'])->name('proceso-pago.index');
Route::post('/confirmar-pago', [CarritoProductosController::class, 'confirmar_pago'])->name('confirmar-pago.index');
Route::post('/verificar-email', [CarritoProductosController::class, 'verificar_email'])->name('verificar-email.index');

/* Reclamaciones */
Route::get('/reclamaciones', [ReclamosController::class, 'create'])->name('reclamaciones.create');
Route::post('/reclamaciones', [ReclamosController::class, 'store'])->name('reclamaciones.store');
Route::get('/reclamaciones/create', [ReclamosController::class, 'create'])->name('reclamaciones.create');
Route::resource('reclamaciones', ReclamosController::class)->only(['index', 'show', 'destroy']);

/* Ubicacion */
Route::view('/ubicacion', 'footer_pages.contactanos.visitanos')->name('ubicacion');

