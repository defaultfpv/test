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
        Schema::create('filters_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('filter_id')->constrained('filters')->onDelete('cascade');
            $table->foreignId('option_id')->constrained('options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filters_options');
    }
};
