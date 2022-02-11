<?php

use App\Http\Controllers\SolicitudEppController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SolicitudEppController::class, 'index'])->name('index');
Route::post('/ingreso', [SolicitudEppController::class, 'ingreso'])->name('ingreso');
Route::get('/solicitud/{idUsuario}', [SolicitudEppController::class, 'solicitud'])->name('solicitud');
Route::post('/crear', [SolicitudEppController::class, 'crear'])->name('crear');
Route::get('/detalle/{idSolicitud}', [SolicitudEppController::class, 'detalle'])->name('detalle');
Route::post('/confirmar', [SolicitudEppController::class, 'confirmar'])->name('confirmar');
Route::get('/solicitudRealizada', [SolicitudEppController::class, 'solicitudRealizada'])->name('solicitudRealizada');
