<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('filieres', function (Blueprint $table) {
            $table->id();                                                   // PK bigint
            $table->foreignId('secteur_id')                                // FK bigint
                  ->constrained('secteurs')
                  ->cascadeOnDelete();
            $table->boolean('residentiel')->default(true);
            $table->string('name', 50)->unique();                       // EN niveau
            $table->timestamps();                                          // created_at / updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filieres');
    }
};
