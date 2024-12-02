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
        Schema::create('content_sections', function (Blueprint $table) {
            $table->id();
            $table->morphs('contentable');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('status')->default(true);
            $table->string('type')->default('content');
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('image_position')->nullable();
            $table->string('bg_type')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_sections');
    }
};
