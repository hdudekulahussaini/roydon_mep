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
        Schema::table('service_subcategories', function (Blueprint $table) {
            $table->text('home_description')->nullable()->after('description');
            $table->string('offerings_heading')->nullable()->after('cta_phone');
            $table->text('offerings_main_description')->nullable()->after('offerings_heading');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_subcategories', function (Blueprint $table) {
            $table->dropColumn([
                'home_description',
                'offerings_heading',
                'offerings_main_description',
            ]);
        });
    }
};
