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
        Schema::create('menu', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('name');
            $table->enum('type', ['blog-category', 'product-category', 'single-page', 'static-page', 'custom-link'])->default('custom-link');
            $table->string('url')->nullable();
            $table->integer('order')->default(1);
            $table->boolean('is_visible')->default(true);
            $table->uuid('parent_id')->nullable()->references('id')->on('menu')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
