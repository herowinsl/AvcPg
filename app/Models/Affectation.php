<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Affectation extends Model
{
    protected $fillable = [
        'groupe_id',
        'module_id',
        'formateur_id',
        'mh_realisee_p',
        'mh_realisee_sync',
    ];

    protected $casts = [
        'mh_realisee_p'    => 'decimal:2',
        'mh_realisee_sync' => 'decimal:2',
    ];

    // ─── Relations ────────────────────────────────────────────────────────────
    
    /**
     * Une affectation appartient à un groupe.
     */
    public function groupe(): BelongsTo
    {
        return $this->belongsTo(Groupe::class);
    }

    /**
     * Une affectation appartient à un module.
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * Une affectation appartient à un formateur.
     */
    public function formateur(): BelongsTo
    {
        return $this->belongsTo(Formateur::class);
    }
}
