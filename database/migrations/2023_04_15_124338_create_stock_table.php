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
        Schema::create('stock', function (Blueprint $table) {
            /**
             * cantidad: variable que define la cantidad total de los libros en el stock
             * disponible: varible que defina la cantidad de libros restantes en el stock
             * prestado: varible que defina la cantidad de libros que estan prestados
             */
            $table->id();
            $table->unsignedBigInteger('libro_id');
            $table->foreign('libro_id')->references('id')->on('libro')->onUpdate('cascade')->ondUpdate('cascade');
            $table->tinyInteger('cantidad');
            $table->tinyInteger('disponible');
            $table->tinyInteger('prestado')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock');
    }
};
