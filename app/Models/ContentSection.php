<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentSection extends Model
{
    use HasFactory;
    protected $fillable = ['contentable_id', 'contentable_type', 'title', 'slug', 'order', 'status', 'type', 'image', 'image_alt', 'image_position', 'bg_type', 'content', 'tab_heading'];

    CONST TYPE_CONTENT = 'content';
    CONST TYPE_IMAGE = 'image';
    CONST BG_DARK = 'dark';
    CONST BG_LIGHT = 'light';
    CONST IMAGE_POSITION_LEFT = 'left';
    CONST IMAGE_POSITION_RIGHT = 'right';
    CONST IMAGE_POSITION_TOP = 'top';
    CONST IMAGE_POSITION_BOTTOM = 'bottom';


    public function contentable(){
        return $this->morphTo();
    }
    

    // on deleting content section, delete the image
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($contentSection) {
                deleteFile($contentSection->image);
        });
    }
}
