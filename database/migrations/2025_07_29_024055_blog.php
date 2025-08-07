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
        Schema::create('blog', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('date');
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignUuid('blog_category')->nullable()->references('id')->on('blog_category')->onDelete('set null');
            $table->text('content');
            $table->string('image_path')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->text('meta_description')->nullable();
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
