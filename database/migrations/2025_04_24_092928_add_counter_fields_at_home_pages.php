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
        Schema::table('home_pages', function (Blueprint $table) {
            $table->string('properties_sold')->nullable();
            $table->string('happy_clients')->nullable();
            $table->string('years_exp')->nullable();
            $table->string('rented_properties')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->dropColumn('properties_sold');
            $table->dropColumn('happy_clients');
            $table->dropColumn('years_exp');
            $table->dropColumn('rented_properties');    
        });
    }
};
