<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_items', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('user_id')->nullable();
            $table->string('user_email')->nullable();
            $table->string('dish_name')->nullable();
            $table->string('dish_image')->nullable();
            $table->string('dish_price')->nullable();
            $table->string('dish_quantity')->nullable();
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
        Schema::dropIfExists('dish_items');
    }
}
