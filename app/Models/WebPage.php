<?php

namespace App\Models;

use App\Traits\UseSchema;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebPage extends Model
{
    use HasFactory,UseSchema,SoftDeletes;
    protected $fillable = ['meta_title', 'meta_description', 'slug', 'image', 'image_alt'];


    // delete image on delete
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($webPage) {
            deleteFile($webPage->image);
        });
    }

    
    public static function getPageData($slug)
    {
        return self::where('slug', $slug)->with('schema')->first();
    }
}
