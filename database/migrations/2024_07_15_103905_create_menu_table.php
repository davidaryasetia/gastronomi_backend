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
        Schema::create('menu', function (Blueprint $table) {
            $table->id('menu_id');

            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')
                    ->references('restaurant_id')
                    ->on('restaurant')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');


            $table->unsignedBigInteger('food_id')
                    ->nullable();
            $table->foreign('food_id')
                    ->references('food_id')
                    ->on('food')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            
            $table->string('name');
            $table->enum('type_food', ['Food', 'Drink']);
            $table->boolean('is_traditional');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
