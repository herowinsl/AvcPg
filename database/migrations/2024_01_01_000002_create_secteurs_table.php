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
        Schema::create('secteurs', function (Blueprint $table) {
            $table->id();                                        // PK bigint
            $table->string('name', 50)->unique();               // UQ varchar(50)
            $table->timestamps();                               // created_at / updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secteurs');
    }
};
