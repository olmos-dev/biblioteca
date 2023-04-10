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
        Schema::create('libro', function (Blueprint $table) {
            $table->id();
            $table->string('isbn',10)->unique();
            $table->string('titulo',60);
            $table->string('autor',60);
            $table->string('editorial',60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libro');
    }
};
