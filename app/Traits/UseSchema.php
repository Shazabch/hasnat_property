<?php

namespace App\Traits;

use App\Models\PageSchema;

trait UseSchema
{
    public function schema()
    {
        return $this->morphOne(PageSchema::class, 'schemaable');
    }
}
