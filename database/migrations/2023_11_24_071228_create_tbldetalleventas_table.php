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
        Schema::create('tbldetalleventas', function (Blueprint $table) {

            $table->bigIncrements('Folio_Ventas');
            $table->string('Codigo_Producto');

            $table->integer('Cantidad');
            $table->timestamps();

            $table->foreign('Folio_Ventas')->references('Folio')->on('ventas');
            $table->foreign('Codigo_Producto')->references('Codigo')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbldetalleventas');
    }
};
