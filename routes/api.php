<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CompraProductoController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\TbldetalleventasController;

Route::apiResource('Usuarios',UsuariosController::class);
Route::apiResource('Compras',CompraController::class);
Route::apiResource('Proveedores',ProveedoresController::class);
Route::apiResource('Productos',ProductosController::class);
Route::apiResource('CompraProducto',CompraProductoController::class);
Route::apiResource('Ventas',VentasController::class);
Route::apiResource('DetalleVentas',TbldetalleventasController::class);