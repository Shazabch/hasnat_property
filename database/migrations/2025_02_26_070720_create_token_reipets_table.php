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
        Schema::create('token_reipets', function (Blueprint $table) {
            $table->id();
            $table->string('token_id')->nullable();
            $table->string('token_amount')->nullable();
            $table->string('seller_id')->nullable();
            $table->string('buyer_id')->nullable();
            $table->string('agent_id')->nullable();
            $table->string('property_id')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('token_reipets');
    }
};
