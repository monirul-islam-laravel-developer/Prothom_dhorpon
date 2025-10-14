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
        Schema::create('editorals', function (Blueprint $table) {
            $table->id();
            $table->string('publisher_and_editor');
            $table->string('executive_editor')->nullable();
            $table->string('message_editor')->nullable();
            $table->string('legal_advisor')->nullable();
            $table->string('advisor')->nullable();
            $table->text('office')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editorals');
    }
};
