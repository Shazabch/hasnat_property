<?php

namespace App\Models;

use App\Traits\UseContentSections;
use App\Traits\UsePublishedStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UseSchema;


class Publication extends Model
{
    use HasFactory,SoftDeletes,UsePublishedStatus,UseContentSections,UseSchema;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'image_alt',
        'short_description',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'published_at',
        'created_by_user',
        'updated_by_user',
        'author',
        'type_id',
        'author_id',    
    ];

    // default values
    protected $attributes = [
        'type_id' => null,
    ];

    public function type()
    {
        return $this->belongsTo(PublicationType::class, 'type_id')->withTrashed()->withDefault();
    }

    public function topics()
    {
        return $this->belongsToMany(PublicationTopic::class, 'topic_publications', 'publication_id', 'topic_id');
    }

    public function author()
    {
        return $this->belongsTo(PublicationAuthor::class, 'author_id')->withTrashed()->withDefault();
    }

    // on deleting content section, delete the image
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($publication) {
                deleteFile($publication->image);
        });
    }
}
