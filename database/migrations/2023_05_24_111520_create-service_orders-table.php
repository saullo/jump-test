<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Cria a tabela service_orders conforme definido no banco de dados db-structure.sql
     */
    public function up(): void
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();
            $table->char('vehiclePlate', 7);
            $table->dateTime('entryDateTime');
            $table->dateTime('exitDateTime');
            $table->string('priceType', 55);
            $table->decimal('price', 12, 2);
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('users');
        });
    }

    /**
     * Deleta a tabela service_orders
     */
    public function down(): void
    {
        Schema::dropIfExists('service_orders');
    }
};
