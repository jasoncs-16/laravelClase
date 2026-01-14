<?php

namespace App\Http\Controllers;

// ============ Definición y Uso de Rutas Laravel ============

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuario/{id}', function ($id) {
    return 'El ID del usuario es: ' . $id;
});

Route::get('/contacto', function () {
    $url = route('contacto');
    return 'Página de contacto ' . $url;
})->name('contacto');

Route::middleware(['auth'])->group(function () {

    $prefijo = '/admin';

    Route::get($prefijo . '/usuarios', function () {
        return 'Gestión de usuarios';
    });

    Route::get($prefijo . '/configuracion', function () {
        return 'Configuración del sistema';
    });
});

// ============ Manejo de Rutas, Controladores y Objeto Request ============

use App\Models\User;
use Illuminate\Http\Request;

Route::post('/procesar-datos', [DatosController::class, 'procesar'], function (Request $solicitud) {
    $nombre = $solicitud->input('name');
    $edad = $solicitud->input('year');
    return "Me llamo $nombre y tengo $edad años";

})->name('procesar_datos.procesar');

class DatosController extends Controller 
{
    public function procesar(Request $solicitud) 
    {
        $validados = $solicitud->validate([
        'name' => 'required|string|max:255',
        'year' => 'required|int',
        ]);
    }
    
}