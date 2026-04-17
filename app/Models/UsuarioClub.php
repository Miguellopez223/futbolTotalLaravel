<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UsuarioClub extends Model
{
    use HasFactory;

    protected $table = 'usuarios_club';

    protected $fillable = ['users_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function pruebas(): HasMany
    {
        return $this->hasMany(Prueba::class, 'usuarios_club_id');
    }

    public function clinicasDePago(): HasMany
    {
        return $this->hasMany(ClinicaDePago::class, 'usuarios_club_id');
    }
}
