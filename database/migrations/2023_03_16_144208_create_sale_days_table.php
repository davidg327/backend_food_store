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
            $table->bigInteger('buy_product');
            $table->bigInteger('product_input');
            $table->bigInteger('sale_product');
            $table->bigInteger('final_product_inventory');
            $table->bigInteger('spent');
            $table->bigInteger('sale');
            $table->bigInteger('product_profit');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')
                ->on('products');
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
