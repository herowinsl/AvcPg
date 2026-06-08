<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Annee extends Model
{
    protected $fillable = [
        'filiere_id',
        'annee',
        'option',
    ];

    // ─── Relations ────────────────────────────────────────────────────────────

    /**
     * Une année appartient à une filière.
     */
    public function filiere(): BelongsTo
    {
        return $this->belongsTo(Filiere::class);
    }

    /**
     * Une année possède plusieurs groupes.
     */
    public function groupes(): HasMany
    {
        return $this->hasMany(Groupe::class);
    }

    /**
     * Une année possède plusieurs modules.
     */
    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }
}
