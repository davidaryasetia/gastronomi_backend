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
        Schema::create('restaurant_photo', function (Blueprint $table) {
            $table->id('restaurant_photo_id');

            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')
                    ->references('restaurant_id')
                    ->on('restaurant')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            
            $table->string('photo_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_photo');
    }
};
