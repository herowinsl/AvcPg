<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Secteur extends Model
{
    protected $fillable = [
        'name',
    ];

    // ─── Relations ────────────────────────────────────────────────────────────

    /**
     * Un secteur possède plusieurs filières.
     */
    public function filieres(): HasMany
    {
        return $this->hasMany(Filiere::class);
    }

    /**
     * Un secteur possède plusieurs formateurs.
     */
    public function formateurs(): HasMany
    {
        return $this->hasMany(Formateur::class);
    }
}
