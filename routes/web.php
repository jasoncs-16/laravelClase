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
use Illuminate\Support\Facades\Validator;

Route::post('/procesar-datos', [DatosController::class, 'procesar']);

class DatosController extends Controller 
{
    public function procesar(Request $solicitud) 
    {
        $validacion = [
            'nombre' => 'required|string|max:255',
            'edad' => 'required|int'
        ];

        $datos = [
            'nombre' => $solicitud->input('nombre'), 
            'edad' => $solicitud->input('edad')
        ];

        $validarDatos = Validator::make($datos, $validacion);

        if ($validarDatos->fails()) {
            return response()->json([
                'mensaje' => 'Error',
                'error' => $validarDatos->errors()
            ], 400);
        } else {
            return "Hola, {$datos['nombre']}. Tienes {$datos['edad']} años.";
        }
    }
}

// ============ Gestión de libros ============

use App\Http\Controllers\LibroController;

Route::get('/libro', [LibroController::class, 'index'])->name('libro.index');
Route::get('/libro/alta', [LibroController::class, 'create'])->name('libro.create');
Route::post('/libro/alta', [LibroController::class, 'create'])->name('libro.create');