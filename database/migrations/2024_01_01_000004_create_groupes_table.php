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
        Schema::create('groupes', function (Blueprint $table) {
            $table->id();                                               // PK bigint
            $table->foreignId('filiere_id')                            // FK bigint
                  ->constrained('filieres')
                  ->cascadeOnDelete();
            $table->foreignId('annee_id')                            // FK bigint
                ->constrained('annees')
                ->cascadeOnDelete();
            $table->string('name', 30)->unique();                      // UQ varchar(30)
            $table->smallInteger('effectif')->unsigned()->nullable();  // smallint
            $table->timestamps();                                      // created_at / updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groupes');
    }
};
