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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('type')->default('Multispeciality');
            $table->string('tags')->nullable();
            $table->string('beds')->nullable();
            $table->string('scale')->nullable();
            $table->string('scope')->nullable();
            $table->string('location')->nullable();
            $table->string('programme')->nullable();
            $table->string('result')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['type', 'tags', 'beds', 'scale', 'scope', 'location', 'programme', 'result']);
        });
    }
};
