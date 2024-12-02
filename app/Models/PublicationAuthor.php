<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PublicationAuthor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'image', 'profession', 'bio', 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube','slug'];

    // delete image on deleting the author
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($author) {
            deleteFile($author->image);
        });
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
