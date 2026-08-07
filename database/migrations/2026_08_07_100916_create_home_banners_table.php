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
        Schema::create('home_banners', function (Blueprint $table) {
            $table->id();

            $table->string('title');

            $table->text('description');

            $table->string('background_image');

            $table->json('specializations')->nullable();
            $table->string('iso_9001_image')->nullable();
            $table->string('iso_14001_image')->nullable();
            $table->string('iso_45001_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_banners');
    }
};
