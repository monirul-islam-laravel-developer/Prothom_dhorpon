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
            $table->string('editor')->nullable();
            $table->string('executive_editor')->nullable();
            $table->string('message_editor')->nullable();
            $table->string('multimedia_incharge')->nullable();
            $table->string('legal_advisor')->nullable();
            $table->string('advisor')->nullable();
            $table->text('office')->nullable();
            $table->text('office2')->nullable();
            $table->string('mobile1', 20)->nullable();
            $table->string('mobile2', 20)->nullable();
            $table->string('email', 50)->nullable();
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
