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
        Schema::create('product1s',function($table){
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('price');
            $table->string('image');
            $table->integer('cate_id')->unsigned();
            $table->foreign('cate_id')->references('id')->on('categories1')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product1s');
    }
};
