<?php

use Illuminate\Support\Facades\Route;

// 1. Ruta básica (Página de inicio)
Route::get('/', function () {
    return view('welcome');
});

// 2. Rutas con parámetros
// Ejemplo: Ver el perfil de un jugador específico por su ID
Route::get('/jugador/{id}', function ($id) {
    return "Mostrando el perfil del jugador con ID: " . $id;
});

// 3. Rutas con parámetros opcionales
// Ejemplo: Buscar clubes. Si no pones nombre, muestra todos.
Route::get('/buscar-club/{nombre?}', function ($nombre = 'todos los clubes') {
    return "Resultados de búsqueda para: " . $nombre;
});

// 4. Rutas con nombre 
// Útil para generar enlaces internos sin escribir la URL completa
Route::get('/configuracion/paises', function () {
    return "Panel de gestión de Países y Ciudades";
})->name('paises.index');

// 5. Grupos de rutas 
// Agrupamos todo lo que sea para el administrador
Route::prefix('admin')->group(function () {
    
    Route::get('/usuarios', function () {
        return "Lista de usuarios del sistema";
    });

    Route::get('/reportes', function () {
        return "Reportes de fichajes y clínicas de pago";
    });
});