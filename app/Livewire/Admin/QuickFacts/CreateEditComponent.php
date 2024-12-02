<?php

namespace App\Livewire\Admin\QuickFacts;

use Livewire\Component;

class CreateEditComponent extends Component
{
    public $quickfact;

    protected $rules = [
        'quickfact.title' => 'nullable',
        'quickfact.description' => 'nullable',
    ];

    public function save()
    {
        $this->validate();
        $this->quickfact->save();
        $this->dispatch('success-notification', message: 'Quick Fact Updated!');
    }

    public function render()
    {
        return view('livewire.admin.quick-facts.create-edit-component');
    }
}
