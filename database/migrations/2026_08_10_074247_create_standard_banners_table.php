<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('standard_banners', function (Blueprint $table) {

            $table->id();

            $table->string('image');

            $table->string('alt_text')->nullable();

            $table->integer('sort_order')->default(1);

            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('standard_banners');
    }
};
