<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClinicaDePago extends Model
{
    use HasFactory;

    protected $table = 'clinica_de_pago';

    protected $fillable = [
        'fecha_inicio_clinica',
        'fecha_fin_clinica',
        'clubes_id',
        'usuarios_club_id',
    ];

    protected function casts(): array
    {
        return [
            'fecha_inicio_clinica' => 'datetime',
            'fecha_fin_clinica' => 'datetime',
        ];
    }

    public function usuarioClub(): BelongsTo
    {
        return $this->belongsTo(UsuarioClub::class, 'usuarios_club_id');
    }
}
