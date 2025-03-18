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
        Schema::create('bill_details', function (Blueprint $table) {
            $table->integer('id')->primary()->unsigned()->notNullable();
            $table->integer('id_bill')->unsigned()->notNullable(); 
            $table->integer('id_product')->notNullable()->unsigned(); 
            $table->integer('quantity')->comment('số lượng'); 
            $table->double('unit_price');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable(); 
            $table->timestamp('updated_at')->nullable();
            $table->foreign('id_bill')->references('id')->on('bills');
            $table->foreign('id_product')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_details');
    }
};
