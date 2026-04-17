<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class JugadorController extends Controller
{
    /**
     * Perfil del jugador autenticado.
     */
    public function perfil(): Response
    {
        $jugador = auth()->user()->jugador;
        $user = auth()->user();

        return response(
            "=== Mi Perfil de Jugador ===\n".
            "Nombre: {$user->nombres} {$user->apellidos}\n".
            "Fecha de nacimiento: {$jugador->fecha_nacimiento->format('d/m/Y')}\n".
            "Altura: {$jugador->altura} m | Peso: {$jugador->peso} kg\n".
            "Pierna hábil: {$jugador->pierna_habil}"
        );
    }

    /**
     * Videos del jugador autenticado.
     */
    public function videos(): Response
    {
        $jugador = auth()->user()->jugador;
        $videos = $jugador->videos()->orderBy('created_at', 'desc')->get();

        if ($videos->isEmpty()) {
            return response("=== Mis Videos ===\nNo tienes videos cargados.");
        }

        $lista = $videos->map(fn ($v) => "{$v->titulo_video} → {$v->link_video}");

        return response("=== Mis Videos ===\n".$lista->implode("\n"));
    }

    /**
     * Descripción o bio del jugador autenticado.
     */
    public function descripcion(): Response
    {
        $jugador = auth()->user()->jugador;

        $descripcion = $jugador->descripcion_jugador ?? 'Sin descripción registrada.';

        return response("=== Mi Descripción ===\n{$descripcion}");
    }
}
