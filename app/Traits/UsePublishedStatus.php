<?php

namespace App\Traits;

trait UsePublishedStatus
{
    public function scopePublished($query)
    {
        return $query->where('status', true);
    }

    public function scopeDraft($query)
    {
        return $query->where('status', false);
    }
}
