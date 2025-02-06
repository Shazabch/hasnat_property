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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title1')->nullable();
            $table->string('sec_title1')->nullable();
            $table->string('content1')->nullable();
            $table->string('image1')->nullable();
            $table->string('main_title2')->nullable();
            $table->string('sub_title2')->nullable();
            $table->string('third_title2')->nullable();
            $table->string('content2')->nullable();
            $table->string('image2')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
