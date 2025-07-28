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
        Schema::create('product_quality_level', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('product')->references('id')->on('product')->onDelete('cascade');
            $table->foreignUuid('quality_level')->references('id')->on('quality_level')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_quality_level');
    }
};
