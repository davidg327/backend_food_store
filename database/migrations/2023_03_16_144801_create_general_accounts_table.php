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
            $table->bigInteger('daily_expenses');
            $table->bigInteger('product_expenses');
            $table->bigInteger('total_expenses');
            $table->bigInteger('total_earnings');
            $table->bigInteger('total_balance');
            $table->unsignedBigInteger('sale_day_id');
            $table->foreign('sale_day_id')
                ->references('id')
                ->on('sale_days');
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')
                ->references('id')
                ->on('accounts');
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
