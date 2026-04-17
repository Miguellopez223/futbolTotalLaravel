<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\JugadorController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// 1. Ruta básica (Página de inicio)
Route::get('/', function () {
    return view('welcome');
});

// 2. Rutas con parámetros
// Ejemplo: Ver el perfil de un jugador específico por su ID
Route::get('/jugadores/{id}', function ($id) {
    return 'Mostrando el perfil del jugador con ID: '.$id;
});

// 3. Rutas con parámetros opcionales
// Ejemplo: Buscar clubes. Si no pones nombre, muestra todos.
Route::get('/buscar-club/{nombre?}', function ($nombre = 'todos los clubes') {
    return 'Resultados de búsqueda para: '.$nombre;
});

// 4. Rutas con nombre
// Útil para generar enlaces internos sin escribir la URL completa
Route::get('/configuracion/paises', function () {
    return 'Panel de gestión de Países y Ciudades';
})->name('paises.index');

// ============================================================
// RUTAS DE DEMOSTRACIÓN (solo para pruebas, eliminar en producción)
// Simulan el login de cada tipo de usuario para demostrar el middleware
// ============================================================
Route::prefix('demo')->group(function () {

    // Inicia sesión como administrador y redirige a su panel
    Route::get('/login-admin', function () {
        $user = User::where('email', 'admin@futboltotal.com')->firstOrFail();
        Auth::login($user);

        return redirect()->route('admin.usuarios');
    });

    // Inicia sesión como usuario de club y redirige a su panel
    Route::get('/login-club', function () {
        $user = User::where('email', 'club@futboltotal.com')->firstOrFail();
        Auth::login($user);

        return redirect()->route('club.dashboard');
    });

    // Inicia sesión como jugador y redirige a su panel
    Route::get('/login-jugador', function () {
        $user = User::where('email', 'jugador@futboltotal.com')->firstOrFail();
        Auth::login($user);

        return redirect()->route('jugador.perfil');
    });

    // Cierra la sesión actual
    Route::get('/logout', function () {
        Auth::logout();

        return 'Sesión cerrada. Ahora si se intenta entrar a /admin/usuarios se verá el error 403 o redirect.';
    });
});

// 5. Rutas protegidas para ADMINISTRADORES
// Solo usuarios con registro en la tabla 'administradores' pueden acceder
Route::prefix('admin')->middleware('admin')->group(function () {

    Route::get('/usuarios', [AdminController::class, 'usuarios'])
        ->name('admin.usuarios');

    Route::get('/reportes', [AdminController::class, 'reportes'])
        ->name('admin.reportes');

    Route::get('/clubes', [AdminController::class, 'clubes'])
        ->name('admin.clubes');
});

// 6. Rutas protegidas para USUARIOS DE CLUB
// Solo usuarios con registro en la tabla 'usuarios_club' pueden acceder
Route::prefix('club')->middleware('club')->group(function () {

    Route::get('/dashboard', [ClubController::class, 'dashboard'])
        ->name('club.dashboard');

    Route::get('/pruebas', [ClubController::class, 'pruebas'])
        ->name('club.pruebas');

    Route::get('/fichados', [ClubController::class, 'fichados'])
        ->name('club.fichados');
});

// 7. Rutas protegidas para JUGADORES
// Solo usuarios con registro en la tabla 'jugadores' pueden acceder
Route::prefix('jugador')->middleware('jugador')->group(function () {

    Route::get('/perfil', [JugadorController::class, 'perfil'])
        ->name('jugador.perfil');

    Route::get('/videos', [JugadorController::class, 'videos'])
        ->name('jugador.videos');

    Route::get('/descripcion', [JugadorController::class, 'descripcion'])
        ->name('jugador.descripcion');
});
