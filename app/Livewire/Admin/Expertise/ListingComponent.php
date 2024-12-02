<?php

namespace App\Livewire\Admin\Expertise;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Expertise;

class ListingComponent extends Component
{
    use WithPagination;
    public $search = '';
    public $enableReorder = false;
    public $status = '';

    protected $queryString = ['search', 'status'];

    public function delete($id)
    {
        $expertise = Expertise::find($id);
        $expertise->delete();
        $this->dispatch('success-notification', message: 'Expertise deleted successfully');
    }

    public function updateOrder($items)
    {
        foreach($items as $item){
            Expertise::where('id',$item['value'])->update(['order' => $item['order']]);
        }
        $this->dispatch('success-notification',message: 'Expertise order updated');
    }

    public function toggleReorder()
    {
        $this->enableReorder = !$this->enableReorder;
    }

    public function showOnDashboard($id,$value)
    {
        Expertise::where('id',$id)->update(['show_on_dashboard' => $value]);
        $this->dispatch('success-notification',message: 'Updated successfully');
    }

    public function render()
    {
        $query = Expertise::query();
        if($this->search){
            $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('slug', 'like', '%' . $this->search . '%')
                ->orWhere('meta_title', 'like', '%' . $this->search . '%')
                ->orWhere('meta_description', 'like', '%' . $this->search . '%')
                ->orWhere('meta_keywords', 'like', '%' . $this->search . '%')
                ->orWhere('tagline', 'like', '%' . $this->search . '%');
        }
        if($this->status != ''){
            $query->where('status', $this->status);
        }
        $query->ordered();
        if($this->enableReorder){
            $expertises = $query->get();
        }else{
            $expertises = $query->paginate(10);
        }
        return view('livewire.admin.expertise.listing-component', compact('expertises'));
    }
}
