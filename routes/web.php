<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

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
})->middleware('auth');

Route::get('/biblioteca/libros',[LibroController::class,'index'])->name('libro.index')->middleware('auth');
Route::get('/biblioteca/libros/crear',[LibroController::class,'create'])->name('libro.create')->middleware('auth');
Route::post('/biblioteca/libros',[LibroController::class,'store'])->name('libro.store')->middleware('auth');
Route::get('/biblioteca/libros/editar/{libro}',[LibroController::class,'edit'])->name('libro.edit')->middleware('auth');
Route::put('/biblioteca/libros/{libro}',[LibroController::class,'update'])->name('libro.update')->middleware('auth');
Route::delete('/biblioteca/libros/{libro}',[LibroController::class,'delete'])->name('libro.delete')->middleware('auth');