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
        Schema::create('planillas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->nullable()->constrained('categorias');
            $table->foreignId('marca_id')->nullable()->constrained('marcas');
            $table->foreignId('raza_id')->nullable()->constrained('razas');
            $table->foreignId('color_id')->nullable()->constrained('colors');
            $table->string('nro_lomo')->nullable();
            $table->string('nro_carimbo')->nullable();
            $table->string('sexo')->nullable();
            $table->smallInteger('estado')->nullable()->default(1); // 0: activo, 1: en observacion

            $table->text('observaciones')->nullable();

            $table->datetime('registro')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planillas');
    }
};
