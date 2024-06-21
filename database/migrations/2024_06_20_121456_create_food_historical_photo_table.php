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
        Schema::create('food_historical_photo', function (Blueprint $table) {
            $table->id('food_historical_photo_id');

            $table->unsignedBigInteger('food_historical_id');
            $table->foreign('food_historical_id')
                    ->references('food_historical_id')
                    ->on('food_historical')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_historical_photo');
    }
};
