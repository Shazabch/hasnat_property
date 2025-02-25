<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specification;

class PropertySpecification extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function specification()
    {
        return $this->belongsTo(Specification::class, 'specification_id');
    }
}
