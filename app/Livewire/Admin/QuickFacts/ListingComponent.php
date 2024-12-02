<?php

namespace App\Livewire\Admin\QuickFacts;

use App\Models\Quickfact;
use Livewire\Component;

class ListingComponent extends Component
{
    public $model_type;
    public $model_id;

    public function add()
    {
        $nextOrder = Quickfact::where('model_type', $this->model_type)
            ->where('model_id', $this->model_id)
            ->max('order') + 1;
        $quickfact = new Quickfact();
        $quickfact->model_type = $this->model_type;
        $quickfact->model_id = $this->model_id;
        $quickfact->order = $nextOrder;
        $quickfact->save();
        $this->dispatch('success-notification', message: 'Quick Fact Added!');
    }

    public function delete($id)
    {
        $quickfact = Quickfact::find($id);
        if ($quickfact) {
            $quickfact->delete();
            $this->dispatch('success-notification', message: 'Quick Fact Deleted!');
        }
    }

    public function updateOrder($items)
    {
        foreach ($items as $item) {
            Quickfact::where('id', $item['value'])->update(['order' => $item['order']]);
        }
    }

    public function render()
    {
        $quickfacts = Quickfact::where('model_type', $this->model_type)
            ->where('model_id', $this->model_id)
            ->orderBy('order', 'asc')
            ->get();
        return view('livewire.admin.quick-facts.listing-component', compact('quickfacts'));
    }
}
