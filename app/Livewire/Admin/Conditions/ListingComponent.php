<?php

namespace App\Livewire\Admin\Conditions;

use App\Models\Condition;
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
        $condition = Condition::find($id);
        $condition->delete();
        $this->dispatch('success-notification', message: 'Condition deleted successfully');
    }

    public function updateOrder($items)
    {
        foreach($items as $item){
            Condition::where('id',$item['value'])->update(['order' => $item['order']]);
        }
        $this->dispatch('success-notification',message: 'Condition order updated');
    }

    public function toggleReorder()
    {
        $this->enableReorder = !$this->enableReorder;
    }

    public function render()
    {
        $query = Condition::query();
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
        $query->ordered();
        if($this->enableReorder){
            $conditions = $query->get();
        }else{
            $conditions = $query->paginate(10);
        }
        return view('livewire.admin.conditions.listing-component', compact('conditions'));
    }
}
