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
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id', 10)->unsigned()->primary()->notNullable(); 
            $table->string('name', 100)->nullable(); 
            $table->unsignedInteger('id_type')->nullable();
            $table->text('description')->nullable(); 
            $table->float('unit_price')->nullable(); 
            $table->float('promotion_price')->nullable();
            $table->string('image', 255)->nullable(); 
            $table->string('unit', 255)->nullable();
            $table->tinyInteger('new')->default(0);
            $table->timestamp('created_at')->nullable(); 
            $table->timestamp('updated_at')->nullable();
            $table->foreign('id_type')->references('id')->on('type_products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
