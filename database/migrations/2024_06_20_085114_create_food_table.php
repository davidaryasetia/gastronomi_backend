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
        Schema::create('food', function (Blueprint $table) {
            $table->id('food_id');
            $table->string('name');
            $table->string('photo_path')->nullable();
            $table->string('category')->nullable();;
            $table->text('description')->nullable();;
            $table->text('food_historical')->nullable();;
            $table->text('ingredients')->nullable();;
            $table->string('url_youtube')->nullable();;
            $table->text('directions')->nullable();;
            $table->text('nutrition')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
