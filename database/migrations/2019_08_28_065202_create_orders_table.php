<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->double('price');
            $table->enum('status', ['pending', 'delivered', 'return']);
            $table->double('upfront')->nullable();
            $table->double('due')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->unsignedInteger('pet_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('insurance_id')->nullable();
            $table->double('cash_back')->nullable();
            $table->timestamp('returned_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
