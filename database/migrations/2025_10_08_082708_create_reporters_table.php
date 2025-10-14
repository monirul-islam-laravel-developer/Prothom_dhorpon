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
        Schema::create('reporters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('designation')->nullable();
            $table->string('mobile', 20)->unique();
            $table->string('nid')->nullable();
            $table->text('address')->nullable();
            $table->string('image')->nullable();
            $table->string('blood_group')->nullable();
            $table->date('joining_date')->nullable();
            $table->boolean('status')->default(1); // 1 = active, 2 = inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporters');
    }
};
