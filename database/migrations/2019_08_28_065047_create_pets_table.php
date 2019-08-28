<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('dob');
            $table->text('description');
            $table->double('price');
            $table->enum('status', ['backyard', 'showroom', 'sold'])->default('backyard');
            $table->string('chip_identifier', 50)->nullable();
            $table->timestamp('chip_implanted_at')->nullable();
            $table->unsignedInteger('category_id');
            $table->boolean('public')->default(1);
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
        Schema::dropIfExists('pets');
    }
}
