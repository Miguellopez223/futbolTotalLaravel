<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\Jugador;
use App\Models\User;
use App\Models\UsuarioClub;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuariosPruebaSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario 1: Administrador
        $admin = User::create([
            'name' => 'Carlos Gomez',
            'nombres' => 'Carlos',
            'apellidos' => 'Gomez',
            'email' => 'admin@futboltotal.com',
            'password' => Hash::make('password'),
            'doc_identidad_usuario' => '10000001',
            'telefono_usuario' => '3001111111',
        ]);
        Administrador::create(['users_id' => $admin->id]);

        // Usuario 2: Usuario de Club
        $club = User::create([
            'name' => 'Laura Martinez',
            'nombres' => 'Laura',
            'apellidos' => 'Martinez',
            'email' => 'club@futboltotal.com',
            'password' => Hash::make('password'),
            'doc_identidad_usuario' => '10000002',
            'telefono_usuario' => '3002222222',
        ]);
        UsuarioClub::create(['users_id' => $club->id]);

        // Usuario 3: Jugador
        $jugadorUser = User::create([
            'name' => 'Pedro Ramirez',
            'nombres' => 'Pedro',
            'apellidos' => 'Ramirez',
            'email' => 'jugador@futboltotal.com',
            'password' => Hash::make('password'),
            'doc_identidad_usuario' => '10000003',
            'telefono_usuario' => '3003333333',
        ]);
        Jugador::create([
            'users_id' => $jugadorUser->id,
            'pierna_habil' => 'D',
            'fecha_nacimiento' => '2000-05-15',
            'altura' => 1.78,
            'peso' => 72.5,
            'descripcion_jugador' => 'Delantero rápido con buen juego aéreo.',
        ]);
    }
}
