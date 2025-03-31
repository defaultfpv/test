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
        Schema::create('catalog_filters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('catalog_id')->constrained('catalog')->onDelete('cascade');
            $table->foreignId('filter_id')->constrained('filters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog_filters');
    }
};
