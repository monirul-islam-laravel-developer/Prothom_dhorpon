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
        Schema::create('upazilas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_categories_id');
            $table->foreignId('subsub_categories_id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->text('seo_tag')->nullable();
            $table->tinyInteger('status')->default('1')->comment('1 is active,2 is Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upazilas');
    }
};
