<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table
                ->foreign('parent_id')
                ->references('id')
                ->on('sliders');
        });

        Schema::table('sliders_lang', function (Blueprint $table) {
            $table
                ->foreign('slider_id')
                ->references('id')
                ->on('sliders');

                $table
                ->foreign('lang')
                ->references('id')
                ->on('languages');
        });

        Schema::table('albums', function (Blueprint $table) {
            $table
                ->foreign('parent_id')
                ->references('id')
                ->on('sliders');
        });

        Schema::table('albums_lang', function (Blueprint $table) {
            $table
                ->foreign('album_id')
                ->references('id')
                ->on('sliders');

                $table
                ->foreign('lang')
                ->references('id')
                ->on('languages');
        });

        Schema::table('services_lang', function (Blueprint $table) {
            $table
                ->foreign('service_id')
                ->references('id')
                ->on('services');

                $table
                ->foreign('lang')
                ->references('id')
                ->on('languages');
        });

        Schema::table('news_lang', function (Blueprint $table) {
            $table
                ->foreign('news_id')
                ->references('id')
                ->on('news');

                $table
                ->foreign('lang')
                ->references('id')
                ->on('languages');
        });

        Schema::table('partners_lang', function (Blueprint $table) {
            $table
                ->foreign('partner_id')
                ->references('id')
                ->on('partners');

                $table
                ->foreign('lang')
                ->references('id')
                ->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
