<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Groupe extends Model
{
    protected $fillable = [
        'filiere_id',
        'annee_id',
        'name',
        'effectif',
    ];

    protected $casts = [
        'effectif' => 'integer',
    ];

    // ─── Relations ────────────────────────────────────────────────────────────


    /**
     * Un groupe appartient à une année de formation.
     */
    public function annee(): BelongsTo
    {
        return $this->belongsTo(Annee::class);
    }

    /**
     * Un groupe possède plusieurs affectations.
     */
    public function affectations(): HasMany
    {
        return $this->hasMany(Affectation::class);
    }
}
