<?php

namespace App\Models;

use App\Enums\FreteStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Frete extends Model
{
    protected $casts = [
        'status' => FreteStatus::class,
    ];
    protected $fillable = ['origem','destino','descricao','frete_id', 'codigo_rastreio', 'remetente_id', 'destinatario_id', 'status'];

    public function etapas(): HasMany
    {
       return $this->hasMany(Etapa::class);
    }

    public function remetente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function destinatario(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }


}
