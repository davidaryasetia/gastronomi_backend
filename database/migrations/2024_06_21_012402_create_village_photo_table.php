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
        Schema::create('village_photo', function (Blueprint $table) {
            $table->id('village_photo_id');

            $table->unsignedBigInteger('village_id');
            $table->foreign('village_id')
                    ->references('village_id')
                    ->on('village')
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
        Schema::dropIfExists('village_photo');
    }
};
