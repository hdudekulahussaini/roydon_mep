<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_processes', function (Blueprint $table) {
            $table->id();

            $table->string('icon', 150);

            $table->string('title', 255);

            $table->text('description');

            $table->string('small_title', 255)->nullable();

            $table->json('features')->nullable();

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_processes');
    }
};
