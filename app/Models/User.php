<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'telefono_usuario', 'doc_identidad_usuario', 'nombres', 'apellidos'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function administrador(): HasOne
    {
        return $this->hasOne(Administrador::class, 'users_id');
    }

    public function jugador(): HasOne
    {
        return $this->hasOne(Jugador::class, 'users_id');
    }

    public function usuarioClub(): HasOne
    {
        return $this->hasOne(UsuarioClub::class, 'users_id');
    }
}
