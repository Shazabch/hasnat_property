<?php

use App\Models\PublicationAuthor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $authors = PublicationAuthor::withTrashed()->get();
        foreach($authors as $key => $author){
            $author->slug = Str::slug($author->name);
            $author->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors_slugs');
    }
};
