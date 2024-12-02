<?php

namespace App\Models;

use App\Traits\UsePublishedStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes,UsePublishedStatus;

    protected $fillable = [
        'name',
        'description',
        'rating',
        'image',
        'status',
        'order',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    // on deleting testimonial, delete the image
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($testimonial) {
                deleteFile($testimonial->image);
        });
    }
}
