<?php

namespace App\Livewire\Admin\Testimonials;

use App\Models\Testimonial;
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
        $testimonials = Testimonial::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->when($this->status != '', function ($query) {
                $query->where('status', $this->status);
            })
            ->ordered()
            ->paginate(10);

        return view('livewire.admin.testimonials.listing-component', [
            'testimonials' => $testimonials,
        ]);
    }

    public function toggleReorder()
    {
        $this->enableReorder = !$this->enableReorder;
    }

    public function delete($id)
    {
        $testimonial = Testimonial::find($id);
        if($testimonial){
            $testimonial->delete();
            $this->dispatch('success-box', message: 'Testimonial deleted successfully');
        }
    }

    public function updateOrder($items)
    {
        foreach ($items as $item) {
            Testimonial::find($item['value'])->update(['order' => $item['order']]);
        }
        
        $this->dispatch('success-notification', message: 'order updated');
    }
}
