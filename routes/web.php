<?php
//Francisco Viera Hernández
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('home'); //Aqui pongo que la raiz te mande a el home.blade
});

Route::get('/product.create', [ProductController::class, 'create'])
    ->name('create');   // ruta para usar en vistas

Route::post('/store', [ProductController::class, 'store'])
    ->name('store');    // el que manda el formulario

    