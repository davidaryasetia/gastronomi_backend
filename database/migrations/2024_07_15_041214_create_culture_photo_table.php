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
        Schema::create('culture_photo', function (Blueprint $table) {
            $table->id('culture_photo_id');

            $table->unsignedBigInteger('culture_id');
            $table->foreign('culture_id')
                    ->references('culture_id')
                    ->on('culture')
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
        Schema::dropIfExists('culture_photo');
    }
};
