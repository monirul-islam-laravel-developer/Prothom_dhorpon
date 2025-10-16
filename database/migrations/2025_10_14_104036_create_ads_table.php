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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->text('head_banner')->nullable();
            $table->text('home_shironam_ads_1')->nullable();
            $table->text('home_shironam_ads_2')->nullable();
            $table->text('news_head_ads')->nullable();
            $table->text('news_pics_under_ads')->nullable();
            $table->text('home_box1_ads')->nullable();
            $table->text('home_box2_ads')->nullable();
            $table->text('news_box_ads')->nullable();
            $table->tinyInteger('status')->default('1')->comment('1 is active,2 is inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
