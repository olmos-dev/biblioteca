<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\FotoPerfilController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RolController;
use App\Http\Requests\FotoPerfilRequest;
use App\Models\Stock;

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

Route::get('/biblioteca', function () {
    return view('index');
})->middleware('auth','verified');

//Libros
Route::get('/biblioteca/libros',[LibroController::class,'index'])->name('libro.index')->middleware('auth');
Route::get('/biblioteca/libros/crear',[LibroController::class,'create'])->name('libro.create')->middleware('auth');
Route::get('/biblioteca/libros/ver/{libro}',[LibroController::class,'show'])->name('libro.show')->middleware('auth');
Route::post('/biblioteca/libros',[LibroController::class,'store'])->name('libro.store')->middleware('auth');
Route::get('/biblioteca/libros/editar/{libro}',[LibroController::class,'edit'])->name('libro.edit')->middleware('auth');
Route::put('/biblioteca/libros/{libro}',[LibroController::class,'update'])->name('libro.update')->middleware('auth');
Route::delete('/biblioteca/libros/{libro}',[LibroController::class,'destroy'])->name('libro.delete')->middleware('auth');

//Stock
Route::get('/biblioteca/stock',[StockController::class,'index'])->name('stock.index')->middleware('auth');
Route::get('/biblioteca/stock/asignar',[StockController::class,'create'])->name('stock.create')->middleware('auth');
Route::get('/biblioteca/stock/{stock}',[StockController::class,'show'])->name('stock.show')->middleware('auth');
Route::post('/biblioteca/stock',[StockController::class,'store'])->name('stock.store')->middleware('auth');
Route::delete('/biblioteca/stock/{stock}',[StockController::class,'destroy'])->name('stock.destroy')->middleware('auth');
Route::get('/biblioteca/stock/incrementar/{stock}',[StockController::class,'increase'])->name('stock.increase')->middleware('auth');
Route::get('/biblioteca/stock/decrementar/{stock}',[StockController::class,'decrementar'])->name('stock.decrementar')->middleware('auth');

//estudiante
Route::get('/biblioteca/estudiante',[EstudianteController::class,'index'])->name('estudiante.index')->middleware('auth');
Route::get('/biblioteca/estudiante/crear',[EstudianteController::class,'create'])->name('estudiante.create')->middleware('auth');

//prestamos
Route::get('/biblioteca/prestamos',[PrestamoController::class,'index'])->name('prestamo.index')->middleware('auth');
Route::get('/biblioteca/prestamos/crear',[PrestamoController::class,'create'])->name('prestamo.create')->middleware('auth');
Route::post('/biblioteca/prestamos',[PrestamoController::class,'store'])->name('prestamo.store')->middleware('auth');
Route::get('/biblioteca/prestamos/editar/{prestamo}',[PrestamoController::class,'edit'])->name('prestamo.edit')->middleware('auth');
Route::put('/biblioteca/prestamos/{prestamo}',[PrestamoController::class,'update'])->name('prestamo.update')->middleware('auth');
Route::patch('/biblioteca/prestamos/estado/{prestamo}',[PrestamoController::class,'estado'])->name('prestamo.estado')->middleware('auth');
Route::delete('/biblioteca/prestamos/{prestamo}',[PrestamoController::class,'destroy'])->name('prestamo.destroy')->middleware('auth');

//Roles
Route::get('/biblioteca/roles',[RolController::class,'index'])->name('rol.index')->middleware(['auth','admin']);
Route::put('/biblioteca/roles/{usuario}',[RolController::class,'asignarRol'])->middleware('auth','admin');

//Perfil
Route::get('/biblioteca/perfil',[PerfilController::class,'show'])->name('perfil.show')->middleware('auth');

//foto de perfil
Route::get('/biblioteca/foto-perfil',[FotoPerfilController::class,'create'])->name('foto.create')->middleware('auth');
Route::post('/biblioteca/foto-perfil',[FotoPerfilController::class,'store'])->name('foto.store')->middleware('auth');
Route::delete('/biblioteca/foto-perfil',[FotoPerfilController::class,'destroy'])->name('foto.destroy')->middleware('auth');

