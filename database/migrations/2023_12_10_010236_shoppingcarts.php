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
        Schema::create('shoppingcarts', function (Blueprint $table) {
            $table->bigIncrements('cartid');
            $table->string('name');
            $table->integer('quantity');
            $table->bigInteger('orderid');
                $table->foreign('userid')->references('userid')->on('users');
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
