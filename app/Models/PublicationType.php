<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PublicationType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function publications()
    {
        return $this->hasMany(Publication::class, 'type_id');
    }
}
