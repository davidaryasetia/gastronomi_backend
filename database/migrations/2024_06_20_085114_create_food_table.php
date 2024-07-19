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
            $table->text('description');
            $table->text('food_historical');
            $table->text('ingredients');
            $table->string('url_youtube');
            $table->text('directions');
            $table->text('nutrition');
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
