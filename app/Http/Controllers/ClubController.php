<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class ClubController extends Controller
{
    /**
     * Panel principal del usuario de club.
     */
    public function dashboard(): Response
    {
        $usuarioClub = auth()->user()->usuarioClub;

        return response(
            "=== Panel de Club ===\n".
            "Bienvenido, {$usuarioClub->user->nombres} {$usuarioClub->user->apellidos}\n".
            "ID de usuario club: {$usuarioClub->id}"
        );
    }

    /**
     * Lista las pruebas (tryouts) convocadas por este club.
     */
    public function pruebas(): Response
    {
        $usuarioClub = auth()->user()->usuarioClub;
        $pruebas = $usuarioClub->pruebas()->orderBy('fecha_prueba')->get();

        if ($pruebas->isEmpty()) {
            return response("=== Pruebas del Club ===\nNo hay pruebas registradas.");
        }

        $lista = $pruebas->map(
            fn ($p) => "Fecha: {$p->fecha_prueba} | Hora: {$p->hora_prueba}"
        );

        return response("=== Pruebas del Club ===\n".$lista->implode("\n"));
    }

    /**
     * Lista los jugadores que han sido fichados a través de este club.
     */
    public function fichados(): Response
    {
        $usuarioClub = auth()->user()->usuarioClub;

        $clinicas = $usuarioClub->clinicasDePago()
            ->orderBy('fecha_inicio_clinica', 'desc')
            ->get();

        if ($clinicas->isEmpty()) {
            return response("=== Clínicas de Pago ===\nNo hay clínicas registradas.");
        }

        $lista = $clinicas->map(
            fn ($c) => "Inicio: {$c->fecha_inicio_clinica} | Fin: {$c->fecha_fin_clinica}"
        );

        return response("=== Clínicas de Pago ===\n".$lista->implode("\n"));
    }
}
