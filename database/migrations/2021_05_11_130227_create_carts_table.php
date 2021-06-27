<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('dish_id');
            $table->string('dish_name')->nullable();
            $table->string('dish_image')->nullable();
            $table->string('dish_price')->nullable();
            $table->string('dish_quantity')->nullable();
            $table->string('user_email')->nullable();
            $table->string('session_id')->nullable();
            $table->string('dish_size')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
