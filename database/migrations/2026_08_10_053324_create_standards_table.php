<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('standards', function (Blueprint $table) {
            $table->id();

            $table->foreignId('standard_section_id')
                ->constrained('standard_sections')
                ->cascadeOnDelete();

            $table->string('icon')->nullable();

            $table->string('abbr');

            $table->string('title');

            $table->text('description');

            $table->string('applied_to')->nullable();

            $table->unsignedInteger('sort_order')->default(0);

            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('standards');
    }
};