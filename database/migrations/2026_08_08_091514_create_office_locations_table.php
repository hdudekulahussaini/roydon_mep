<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('office_locations', function (Blueprint $table) {
            $table->id();

            $table->string('flag', 20);

            $table->string('city', 100);

            $table->string('type', 255);

            $table->text('description');

            $table->text('address')->nullable();

            $table->string('phone', 100)->nullable();

            $table->string('email', 255)->nullable();

            $table->text('seo')->nullable();

            $table->boolean('status')->default(true);

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('office_locations');
    }
};
