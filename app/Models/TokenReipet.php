<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenReipet extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function property()
{
    return $this->belongsTo(Properties::class, 'property_id');

}
public function buyer()
{
    return $this->belongsTo(Buyer::class, 'buyer_id');
}
public function seller()
{
    return $this->belongsTo(Seller::class, 'seller_id');
}
public function agent()
{
    return $this->belongsTo(TeamSection::class, 'agent_id');
}

}

