<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    protected $fillable = [
        'annee_id',
        'code',
        'name',
        'regional',
        'mhp_s1_drif',
        'mhsyn_s1_drif',
        'mhasyn_s1_drif',
        'mhp_s2_drif',
        'mhsyn_s2_drif',
        'mhasyn_s2_drif',
    ];

    protected $casts = [
        'regional'      => 'boolean',
        'mhp_s1_drif'   => 'decimal:2',
        'mhsyn_s1_drif' => 'decimal:2',
        'mhasyn_s1_drif'=> 'decimal:2',
        'mhp_s2_drif'   => 'decimal:2',
        'mhsyn_s2_drif' => 'decimal:2',
        'mhasyn_s2_drif'=> 'decimal:2',
    ];

    // ─── Relations ────────────────────────────────────────────────────────────

    /**
     * Un module appartient à une année de formation.
     */
    public function annee(): BelongsTo
    {
        return $this->belongsTo(Annee::class);
    }

    /**
     * Un module possède plusieurs affectations.
     */
    public function affectations(): HasMany
    {
        return $this->hasMany(Affectation::class);
    }
}
