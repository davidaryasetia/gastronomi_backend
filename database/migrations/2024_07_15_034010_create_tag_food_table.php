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
        Schema::create('tag_food', function (Blueprint $table) {
            $table->id('tag_food_id');
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')
                    ->references('food_id')
                    ->on('food')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->string('nametag');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_food');
    }
};
