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
            $table->string('category');
            $table->longText('description');
            $table->longText('food_historical');
            $table->longText('ingredients');
            $table->string('url_youtube');
            $table->longText('directions');
            $table->longText('nutrition');
            $table->string('address');
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
