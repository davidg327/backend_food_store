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
        Schema::create('sale_days', function (Blueprint $table) {
            $table->id();
            $table->timestamp('day');
            $table->bigInteger('buy_product'); //Productos comprados
            $table->bigInteger('product_input'); //Entrada de productos no tocar
            $table->bigInteger('sale_product'); //Productos vendidos
            $table->bigInteger('final_product_inventory'); //Inventario final
            $table->bigInteger('spent'); //Valor en pesos de lo que valio eso hoy
            $table->bigInteger('sale'); //Valor en pesos de lo que se vendio
            $table->bigInteger('product_profit'); //Ganancia del producto
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')
                ->on('products');
            $table->unsignedBigInteger('general_account_id');
            $table->foreign('general_account_id')
                ->references('id')
                ->on('general_accounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_days');
    }
};
