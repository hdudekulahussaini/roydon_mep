<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_banners', function (Blueprint $table) {
            $table->string('iso_9001_title')
                ->nullable()
                ->after('specializations');

            $table->string('iso_14001_title')
                ->nullable()
                ->after('iso_9001_image');

            $table->string('iso_45001_title')
                ->nullable()
                ->after('iso_14001_image');
        });
    }

    public function down(): void
    {
        Schema::table('home_banners', function (Blueprint $table) {
            $table->dropColumn([
                'iso_9001_title',
                'iso_14001_title',
                'iso_45001_title',
            ]);
        });
    }
};