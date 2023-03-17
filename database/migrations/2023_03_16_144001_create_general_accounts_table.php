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
        Schema::create('general_accounts', function (Blueprint $table) {
            $table->id();
            $table->timestamp('day'); //Dia
            $table->bigInteger('daily_expenses'); //Gastos diarias
            $table->bigInteger('product_expenses'); //Gastos productos general
            $table->bigInteger('total_expenses'); //Total de gasto
            $table->bigInteger('total_broken'); //Total de vencidos
            $table->bigInteger('total_sales'); //Total de ventas
            $table->bigInteger('total_earnings'); //Ganancias totales
            $table->bigInteger('total_balance'); // Total
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_accounts');
    }
};
