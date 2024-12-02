<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSchema extends Model
{
    use HasFactory;
    protected $fillable = ['schemaable_id', 'schemaable_type','schema'];

    public function page()
    {
        return $this->morphTo();
    }
}
