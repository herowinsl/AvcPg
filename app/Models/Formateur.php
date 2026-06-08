<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Formateur extends Model
{
    protected $fillable = [
        'secteur_id',
        'name',
    ];

    // ─── Relations ────────────────────────────────────────────────────────────

    /**
     * Un formateur appartient à un secteur.
     */
    public function secteur(): BelongsTo
    {
        return $this->belongsTo(Secteur::class);
    }

    /**
     * Un formateur possède plusieurs affectations.
     */
    public function affectations(): HasMany
    {
        return $this->hasMany(Affectation::class);
    }
}
