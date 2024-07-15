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
        Schema::create('food_photo', function (Blueprint $table) {
            $table->id('food_photo_id');

            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')
                    ->references('food_id')
                    ->on('food');

            $table->string('photo_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_photo');
    }
};
