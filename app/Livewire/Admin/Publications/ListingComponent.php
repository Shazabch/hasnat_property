<?php

namespace App\Livewire\Admin\Publications;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Publication;

class ListingComponent extends Component
{
    use WithPagination;
    public $search = '';
    public $status = '';

    protected $queryString = ['search', 'status'];

    public function delete($id)
    {
        $publication = Publication::find($id);
        $publication->delete();
        $this->dispatch('success-notification', message: 'Publication deleted successfully');
    }

    public function render()
    {
        $query = Publication::query();
        if($this->search){
            $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('slug', 'like', '%' . $this->search . '%')
                ->orWhere('meta_title', 'like', '%' . $this->search . '%')
                ->orWhere('meta_description', 'like', '%' . $this->search . '%')
                ->orWhere('meta_keywords', 'like', '%' . $this->search . '%');
        }
        if($this->status != ''){
            $query->where('status', $this->status);
        }
        $query->latest();
        $publications = $query->paginate(10);
        return view('livewire.admin.publications.listing-component', compact('publications'));
    }
}

