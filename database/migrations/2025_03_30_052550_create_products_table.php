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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 500)->nullable();
            $table->text('description', 100)->nullable();
            $table->text('structure', 500)->nullable();
            $table->text('features', 500)->nullable();
            $table->integer('count_sales')->default(0);
            $table->foreignId('section_pet_id')->constrained('sections_pets')->onDelete('cascade');
            $table->integer('quantity')->default(0);
            $table->integer('price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
