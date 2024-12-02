<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quickfact extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'order',
    ];

    public function parent()
    {
        return $this->morphTo();
    }
}
