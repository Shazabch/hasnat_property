<?php

namespace App\Livewire\Admin\PropertyEnquiry;


use App\Models\PropertyEnquiry;
use Livewire\Component;
use Livewire\WithPagination;

class PropertyEnquiriesManagementComponent extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $enquiries = PropertyEnquiry::where('name', 'like', '%' . $this->search . '%')
        ->orWhere('email', 'like', '%' . $this->search . '%')
        ->orWhere('phone', 'like', '%' . $this->search . '%')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        return view('livewire.admin.property-enquiry.property-enquiries-management-component', compact('enquiries'));
    }
}
