<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table-> string('Codigo', 40)->primary();
            $table-> string ('Nombre');
            $table-> double ('Precio_Venta',5,2);
            $table-> integer ('Existencias');
            $table->string('Codigo_Proveedor', 30);
            $table->foreign('Codigo_Proveedor')->references('Codigo')->on('proveedores');

            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
