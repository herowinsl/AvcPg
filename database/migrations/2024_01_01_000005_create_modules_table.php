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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('annee_id')->constrained('annees')->cascadeOnDelete();
            $table->string('code', 30)->unique();
            $table->string('name', 200);
            $table->boolean('regional')->default(false);
            //------------------------------ s1
            $table->decimal('mhp_s1_drif', 6, 2)->default(0);
            $table->decimal('mhsyn_s1_drif', 6, 2)->default(0);
            $table->decimal('mhasyn_s1_drif', 6, 2)->default(0);
            //------------------------------ s2
            $table->decimal('mhp_s2_drif', 6, 2)->default(0);
            $table->decimal('mhsyn_s2_drif', 6, 2)->default(0);
            $table->decimal('mhasyn_s2_drif', 6, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
