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
        Schema::create('compra_productos', function (Blueprint $table) {
            $table->bigIncrements('id_compra_producto');
            $table->string('id_producto',40);
            $table->unsignedBigInteger('id_compra');
            $table->integer('cantidad');
            $table->decimal('precio_compra', 10, 2);
            $table->timestamps();

            $table->foreign('id_producto')->references('Codigo')->on('productos');
            $table->foreign('id_compra')->references('ID')->on('compras');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra_productos');
    }
};
