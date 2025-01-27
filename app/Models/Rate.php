<?php

namespace App\Models;
use App\Traits\UsePublishedStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rate extends Model
{
    use HasFactory, SoftDeletes,UsePublishedStatus;

    protected $fillable = ['title', 'slug', 'description', 'image', 'image_alt', 'content'];
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }


    public static function boot()
    {
        parent::boot();

        static::deleting(function ($item) {
                deleteFile($item->image);
        });
    }
}
