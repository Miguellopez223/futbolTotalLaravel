<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';

    protected $fillable = [
        'titulo_video',
        'link_video',
        'jugadores_id',
    ];

    public function jugador(): BelongsTo
    {
        return $this->belongsTo(Jugador::class, 'jugadores_id');
    }
}
