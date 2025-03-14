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
        Schema::create('conditions', function (Blueprint $table) {
            $table->id();
            $table->mediumText('title')->nullable();
            $table->mediumText('slug')->nullable();
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->text('short_description')->nullable();
            $table->boolean('status')->default(false);
            $table->string('meta_title')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('created_by_user')->nullable();
            $table->string('updated_by_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conditions');
    }
};
