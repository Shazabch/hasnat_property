<?php

namespace App\Livewire\Admin\Rates;

use App\Models\Rate;
use Livewire\Component;
use Livewire\WithPagination;

class ListingComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $enableReorder = false;
    public $status = '';

    protected $queryString = ['search', 'status'];

    public function render()
    {
        $rates = Rate::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->when($this->status != '', function ($query) {
                $query->where('status', $this->status);
            })
            ->ordered()
            ->paginate(10);

        return view('livewire.admin.rates.listing-component', [
            'rates' => $rates,
        ]);
    }

    public function toggleReorder()
    {
        $this->enableReorder = !$this->enableReorder;
    }

    public function delete($id)
    {
        $rate = Rate::find($id);
        if($rate){
            $rate->delete();
            $this->dispatch('success-box', message: 'Rate deleted successfully');
        }
    }

    public function updateOrder($items)
    {
        foreach ($items as $item) {
            Rate::find($item['value'])->update(['order' => $item['order']]);
        }

        $this->dispatch('success-notification', message: 'order updated');
    }
}
