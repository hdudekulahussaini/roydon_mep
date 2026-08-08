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
        Schema::create('service_subcategories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('heading')->nullable();
            $table->text('description')->nullable();
            $table->json('images')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_phone')->nullable();
            $table->json('offerings_title')->nullable();
            $table->json('offerings_description')->nullable();
            $table->json('offerings_icon')->nullable();
            $table->json('offerings_sort_order')->nullable();
            $table->string('compliance_title')->nullable();
            $table->text('compliance_description')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_subcategories');
    }
};
