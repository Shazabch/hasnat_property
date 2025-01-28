<?php

namespace App\Livewire;

use App\Models\Properties;
use Livewire\Component;

class RelatedCardComponent extends Component
{
    public function render()
    {
        $properties= Properties::where('status',1)->take(3)->get();
        return view('livewire.related-card-component', compact('properties'));
    }
}
