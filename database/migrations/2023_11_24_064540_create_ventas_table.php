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
        Schema::create('ventas', function (Blueprint $table) {
            // Cambiado de integer a bigIncrements para utilizar un tipo de dato comúnmente usado para claves primarias
            $table->bigIncrements('Folio');           
            $table->date('Fecha');
            $table->double('Monto_Total', 10, 2);
            $table->unsignedBigInteger('id_usuario');
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
