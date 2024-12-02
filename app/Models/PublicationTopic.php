<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationTopic extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function publications()
    {
        return $this->belongsToMany(Publication::class, 'topic_publications', 'publication_id', 'publication_id');
    }
}
