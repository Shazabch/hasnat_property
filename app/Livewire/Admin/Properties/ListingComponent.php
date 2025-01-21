<?php

namespace App\Livewire\Admin\Properties;

use App\Models\Properties;
use Livewire\Component;
use Livewire\WithPagination;


class ListingComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $enableReorder = false;
    public $status = '';

    protected $queryString = ['search', 'status'];

    public function delete($id)
    {
        $property = Properties::find($id);
        $property->delete();
        $this->dispatch('success-notification', message: 'Property deleted successfully');
    }

    public function updateOrder($items)
    {
        foreach ($items as $item) {
            Properties::where('id', $item['value'])->update(['order' => $item['order']]);
        }
        $this->dispatch('success-notification', message: 'Property order updated');
    }

    public function toggleReorder()
    {
        $this->enableReorder = !$this->enableReorder;
    }

    public function showOnDashboard($id, $value)
    {
        Properties::where('id', $id)->update(['show_on_dashboard' => $value]);
        $this->dispatch('success-notification', message: 'Updated successfully');
    }
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc'); // Adjust as needed, e.g., order by 'id' or 'created_at'
    }
    public function render()
    {
        // Build the query
        $query = Properties::query();

        // Apply search filters
        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('slug', 'like', '%' . $this->search . '%')
                  ->orWhere('adress', 'like', '%' . $this->search . '%')
                  ->orWhere('price', 'like', '%' . $this->search . '%')
                  ->orWhere('area', 'like', '%' . $this->search . '%');
        }

        // Apply status filter
        if ($this->status !== '') {
            $query->where('status', $this->status);
        }

        // Apply ordering if necessary
        if ($this->enableReorder) {
            $properties = $query->get(); // Get all items without pagination
        } else {
            $properties = $query->paginate(10); // Paginate results if reorder is not enabled
        }

        // Return the view with the properties
        return view('livewire.admin.properties.listing-component', compact('properties'));
    }

}
