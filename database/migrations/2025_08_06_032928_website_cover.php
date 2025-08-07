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
        Schema::create('website_cover', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->nullable();
            $table->string('title_color')->nullable();
            $table->enum('title_position', ['left','right'])->default('left');
            $table->string('subtitle')->nullable();
            $table->string('subtitle_color')->nullable();
            $table->enum('button_type', ['border', 'filled', 'none'])->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('image_path')->nullable();
            $table->string('background_path')->nullable();
            $table->string('overlay_color')->nullable();
            $table->string('overlay_opacity')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_cover');
    }
};
