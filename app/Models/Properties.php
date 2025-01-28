<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyImages;
use App\Models\PropertySpecification;
use App\Models\PropertyAmeneties;
class Properties extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function photos()
    {
        return $this->hasMany(PropertyImages::class);
    }
    public function photosExceptMain()
    {
        return $this->hasMany(PropertyImages::class,  'property_id', 'id')->where('is_main', '0');
    }
    public function amenities()
    {
        return $this->hasMany(PropertyAmeneties::class,  'property_id', 'id');
    }
    public function specifications()
    {
        return $this->hasMany(PropertySpecification::class,  'property_id', 'id');
    }
}
