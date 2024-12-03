<?php

use App\Http\Controllers\imagenesController;
use App\Http\Controllers\MejorOfertaController;
use App\Http\Controllers\OfertaEducativaController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\TablaUsuariosController;
use Illuminate\Support\Facades\Route;
use App\Livewire\CrearOfertaComponente as LivewireCrearOfertaComponente;
use App\Livewire\OfAdminComponente as LivewireOfAdminComponente;

// Redirigir a la página de login en la raíz
Route::get('/', function () {
    return redirect()->route('login'); // Redirige al login
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/usuarios', TablaUsuariosController::class);
    Route::resource('/oferta-educativa', OfertaEducativaController::class);
    Route::resource('/mejor-oferta', MejorOfertaController::class);
    Route::resource('/imagenes', imagenesController::class);
    Route::resource('/servicios', ServiciosController::class);

    // Rutas para los componentes Livewire
    Route::get('/crear-oferta', LivewireCrearOfertaComponente::class)->name('crear.oferta');
    Route::get('/ofertas-admin', LivewireOfAdminComponente::class)->name('ofertas.admin');
});
