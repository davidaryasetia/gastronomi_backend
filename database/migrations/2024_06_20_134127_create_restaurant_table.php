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
        Schema::create('restaurant', function (Blueprint $table) {
            $table->id('restaurant_id');
            $table->string('name_restaurant');
            $table->longText('description');
            $table->longText('list_food');
            $table->longText('list_drink');
            $table->string('address');
            $table->time('open_at');
            $table->time('close_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant');
    }
};
