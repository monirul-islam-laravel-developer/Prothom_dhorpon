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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('author_id')->nullable();
            $table->foreignId('category_id');
            $table->foreignId('subcategory_id')->nullable();
            $table->foreignId('dristrict_id')->nullable();
            $table->foreignId('upazela_id')->nullable();
            $table->foreignId('reporter_id')->nullable();
            $table->text('title');
            $table->text('slug')->nullable();
            $table->longText('description')->nullable();
            $table->tinyInteger('lead_news')->default('2')->comment('1 is active,2 is inactive');
            $table->tinyInteger('sublead_news')->default('2')->comment('1 is active,2 is inactive');
            $table->longText('seo_tag')->nullable();
            $table->unsignedInteger('view_count')->default(0);
            $table->dateTime('updated_date')->nullable();
            $table->text('image');
            $table->text('image_caption')->nullable();
            $table->tinyInteger('status')->default('1')->comment('1 is active,0 is inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
