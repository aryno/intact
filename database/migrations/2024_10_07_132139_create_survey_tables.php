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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('app_id')->constrained()->onDelete('cascade')->default(1);
            $table->string('title');
            $table->string('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')->constrained()->onDelete('cascade');
            $table->string('question_text');
            $table->enum('question_type', ['textbox', 'textarea', 'radio', 'checkbox']);
            $table->json('question_options')->default(null)->nullable();
            $table->timestamps();
        });

        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->unique()->nullable();
            $table->foreignId('survey_id')->constrained()->onDelete('cascade');
            $table->json('answers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('responses');
    }
};
