<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Filiere extends Model
{
    protected $fillable = [
        'secteur_id',
        'name',
        'residentiel',
    ];

    protected $casts = [
        'residentiel' => 'boolean',
    ];

    // ─── Relations ────────────────────────────────────────────────────────────

    /**
     * Une filière appartient à un secteur.
     */
    public function secteur(): BelongsTo
    {
        return $this->belongsTo(Secteur::class);
    }

    /**
     * Une filière possède plusieurs années de formation.
     */
    public function annees(): HasMany
    {
        return $this->hasMany(Annee::class);
    }
    
}
