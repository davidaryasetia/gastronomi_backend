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
        Schema::create('culture', function (Blueprint $table) {
            $table->id('culture_id');
            $table->string('name_culture');
            $table->longText('description');
            $table->string('url_youtube')->nullable('true');
            $table->string('photo_path')->nullable('true');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('culture');
    }
};
