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
        Schema::table('expertises', function (Blueprint $table) {
            $table->boolean('show_on_dashboard')->default(false);
            $table->text('flip_card_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expertises', function (Blueprint $table) {
            $table->dropColumn('show_on_dashboard');
            $table->dropColumn('flip_card_description');
        });
    }
};
