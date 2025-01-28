<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Amenities;

class PropertyAmeneties extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function amenity()
    {
        return $this->belongsTo(Amenities::class, 'amenetise_id');
    }
}
