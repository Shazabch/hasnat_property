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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->boolean('featured')->nullable();
            $table->string('main_image')->nullable();
            $table->string('price')->nullable();
            $table->string('title')->nullable();
            $table->string('adress')->nullable();
            $table->string('status')->nullable();
            $table->string('area')->nullable();
            $table->string('slug')->nullable();
            $table->string('property_type')->nullable();
            $table->string('description')->nullable();
            $table->string('categories')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
