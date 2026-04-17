<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prueba extends Model
{
    use HasFactory;

    protected $table = 'pruebas';

    protected $fillable = [
        'fecha_prueba',
        'hora_prueba',
        'clubes_id',
        'usuarios_club_id',
    ];

    protected function casts(): array
    {
        return [
            'fecha_prueba' => 'date',
        ];
    }

    public function usuarioClub(): BelongsTo
    {
        return $this->belongsTo(UsuarioClub::class, 'usuarios_club_id');
    }
}
