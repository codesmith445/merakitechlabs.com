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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('title')->nullable();
            $table->string('header')->nullable();
            $table->longText('paragraph')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('article_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            $table->integer('step_number');
            // $table->integer('step_number');
            $table->string('image')->nullable();
            $table->longText('step_header')->nullable();
            $table->longText('paragraph')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
        Schema::dropIfExists('article_steps');
    }
};
