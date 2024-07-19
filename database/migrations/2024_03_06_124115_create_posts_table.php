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
            $table->string('category');
            $table->string('title')->nullable();
            $table->longText('goals')->nullable();
            // $table->date('project_date');
            $table->string('project_url')->nullable()->unique();
            $table->longText('project_detail')->nullable();
            $table->string('image')->nullable();
            $table->longText('source_code')->nullable();
            $table->longText('instructions')->nullable();
            $table->timestamps();
        });

        Schema::create('post_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->integer('step_number');
            $table->string('image')->nullable();
            $table->string('step_header')->nullable();
            $table->longText('instructions')->nullable();
            $table->longText('source_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_steps');
    }
};