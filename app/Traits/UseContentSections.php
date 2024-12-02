<?php

namespace App\Traits;

use App\Models\ContentSection;

trait UseContentSections
{
    public function contentSections()
    {
        return $this->morphMany(ContentSection::class, 'contentable')->orderBy('order');
    }

    public function contentTabs()
    {
        return $this->morphMany(ContentSection::class, 'contentable')->where('tab_heading', '!=', null)->orderBy('order');
    }
}
