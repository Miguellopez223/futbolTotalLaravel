<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\User;
use App\Models\UsuarioClub;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    /**
     * Lista todos los usuarios registrados en el sistema.
     */
    public function usuarios(): Response
    {
        $usuarios = User::orderBy('apellidos')->get(['id', 'nombres', 'apellidos', 'email', 'doc_identidad_usuario']);

        $lista = $usuarios->map(fn ($u) => "{$u->id} | {$u->apellidos}, {$u->nombres} | {$u->email}");

        return response("=== Lista de Usuarios ===\n".$lista->implode("\n"));
    }

    /**
     * Muestra reportes generales de fichajes y clínicas.
     */
    public function reportes(): Response
    {
        $totalJugadores = Jugador::count();
        $totalUsuariosClub = UsuarioClub::count();

        return response(
            "=== Reportes del Sistema ===\n".
            "Jugadores registrados: {$totalJugadores}\n".
            "Usuarios de club registrados: {$totalUsuariosClub}"
        );
    }

    /**
     * Panel de gestión de clubes y sus usuarios.
     */
    public function clubes(): Response
    {
        $usuariosClub = UsuarioClub::with('user:id,nombres,apellidos,email')->get();

        $lista = $usuariosClub->map(
            fn ($uc) => "ID club_user: {$uc->id} | {$uc->user?->apellidos}, {$uc->user?->nombres}"
        );

        return response("=== Gestión de Clubes ===\n".$lista->implode("\n"));
    }
}
