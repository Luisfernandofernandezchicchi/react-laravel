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
        Schema::create('zapatos', function (Blueprint $table) {
            $table->id();
            $table->string("marca");
            $table->string("modelo");
            $table->integer("tamaño");
            $table->string("tipo");
            $table->string("imagen");
            $table->string("estado");
            $table->integer("precio");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zapatos');
    }
};
