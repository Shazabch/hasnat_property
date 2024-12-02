<?php

namespace App\Livewire\Admin\WebPages;

use App\Models\WebPage;
use Livewire\Component;
use Livewire\WithPagination;

class ListingComponent extends Component
{
    use WithPagination;
    public $search = '';

    protected $queryString = ['search', 'status'];

    public function delete($id)
    {
        $webPage = WebPage::find($id);
        $webPage->delete();
        $this->dispatch('success-notification', message: 'Web Page deleted successfully');
    }

    public function render()
    {
        $query = WebPage::query();
        if($this->search){
            $query->where('meta_title', 'like', '%' . $this->search . '%')
                ->orWhere('slug', 'like', '%' . $this->search . '%')
                ->orWhere('meta_description', 'like', '%' . $this->search . '%');
        }
        $webPages = $query->paginate(10);
        return view('livewire.admin.web-pages.listing-component', compact('webPages'));
    }
}