<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Table "affectations" — pivot enrichi (groupe × module × formateur)
     */
    public function up(): void
    {
        Schema::create('affectations', function (Blueprint $table) {
            $table->id();                                                       // PK bigint

            // --- Foreign keys ---
            $table->foreignId('groupe_id')                                      // FK bigint
                  ->constrained('groupes')
                  ->cascadeOnDelete();

            $table->foreignId('module_id')                                      // FK bigint
                  ->constrained('modules')
                  ->cascadeOnDelete();

            $table->foreignId('formateur_id')                                   // FK bigint
                  ->constrained('formateurs')
                  ->cascadeOnDelete();

            // --- Heures planifiées DRIF ---
            $table->decimal('mh_realisee_p', 6, 2)->default(0);                  // decimal(6,2)
            $table->decimal('mh_realisee_sync', 6, 2)->default(0);               // decimal(6,2)

            $table->timestamps();                                               // created_at / updated_at

            // --- Unique constraint: one assignment per groupe+module+formateur ---
            $table->unique(['groupe_id', 'module_id', 'formateur_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectations');
    }
};
