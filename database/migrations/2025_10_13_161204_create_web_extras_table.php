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
        Schema::create('web_extras', function (Blueprint $table) {
            $table->id();
            $table->longText('about_us')->nullable();
            $table->longText('privacy_and_policy')->nullable();
            $table->longText('terms_and_conditions')->nullable();
            $table->tinyInteger('status')->default('1')->comment('1 is active,2 is inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_extras');
    }
};
