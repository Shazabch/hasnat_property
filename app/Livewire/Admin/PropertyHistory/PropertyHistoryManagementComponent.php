<?php

namespace App\Livewire\Admin\PropertyHistory;

use Livewire\Component;
use App\Models\TokenReipet;
use Livewire\WithPagination;


class PropertyHistoryManagementComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';


    public function searchRecords()
    {
        $this->resetPage();
    }
    public function updatedSearch(){
        $this->resetPage();
    }

    public function sortBy($field)
    {
        $this->sortDirection = ($this->sortField === $field && $this->sortDirection === 'asc') ? 'desc' : 'asc';
        $this->sortField = $field;
    }

    public function render()
    {
        $propertyHistory = TokenReipet::query()
            ->with(['seller', 'buyer', 'agent', 'property'])
            ->when($this->search, function ($query) {
                $query->where('token_id', 'like', '%' . $this->search . '%')
                ->orWhere('token_amount', 'like', "%{$this->search}%")
                    ->orWhereHas('seller', fn($q) => $q->where('seller_name', 'like', "%{$this->search}%"))
                    ->orWhereHas('buyer', fn($q) => $q->where('buyer_name', 'like', "%{$this->search}%"))
                    ->orWhereHas('agent', fn($q) => $q->where('name', 'like', "%{$this->search}%"))
                    ->orWhereHas('property', fn($q) => $q->where('title', 'like', "%{$this->search}%"));
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(20);


        return view('livewire.admin.property-history.property-history-management-component' , compact('propertyHistory'));
    }
}
