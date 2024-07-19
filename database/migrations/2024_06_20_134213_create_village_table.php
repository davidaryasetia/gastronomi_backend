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
        Schema::create('village', function (Blueprint $table) {
            $table->id('village_id');
            $table->string('name_village');
            $table->time('open_at');
            $table->time('close_at');
            $table->string('address');
            $table->text('fasility');
            $table->text('mandatory_equipment');
            $table->string('contact')->nullable(true);
            $table->string('photo_path')->nullable(true);
            $table->string('url_website')->nullable(true);
            $table->string('url_facebook')->nullable(true);
            $table->string('url_instagram')->nullable(true);
            $table->string('url_twitter')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village');
    }
};
