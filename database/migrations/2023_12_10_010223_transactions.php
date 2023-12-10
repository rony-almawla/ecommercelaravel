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
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('transactionid');
            $table->integer('quantity');
            $table->decimal('amount');
            $table->date('transactiondate');
            $table->bigInteger('orderid');
                $table->foreign('orderid')->references('orderid')->on('orders');
            $table->bigInteger('productid');
                $table->foreign('productid')->references('productid')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
