<?php

namespace App\Traits;

use App\Models\Quickfact;

trait UseQuickFacts
{
    public function quickfacts()
    {
        return $this->morphMany(Quickfact::class, 'model');
    }
}
