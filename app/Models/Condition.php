<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UseContentSections;
use App\Traits\UsePublishedStatus;
use App\Traits\UseSchema;
class Condition extends Model
{
    use HasFactory,SoftDeletes,UseContentSections,UsePublishedStatus,UseSchema;

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
        'order',
        'detail_icon',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order','asc');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_user')->withTrashed()->withDefault(['name' => 'Unknown']);
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by_user')->withTrashed()->withDefault(['name' => 'Unknown']);
    }

    // on deleting condition, delete the image
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($condition) {
                deleteFile($condition->image);
        });
    }
}
