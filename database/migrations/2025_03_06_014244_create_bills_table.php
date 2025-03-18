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
        Schema::create('bills', function (Blueprint $table) {
            $table->integer('id')->primary()->unsigned()->notNullable(); 
            $table->integer('id_customer')->nullable();
            $table->date('date_order')->nullable(); 
            $table->float('total')->nullable()->comment('tổng tiền'); 
            $table->string('payment', 200)->nullable()->comment('hình thức thanh toán'); 
            $table->string('note', 500)->nullable(); 
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable(); 
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
