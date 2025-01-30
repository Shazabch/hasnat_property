<?php

namespace App\Livewire\Admin\PropertyEnquiry;


use App\Models\PropertyEnquiry;
use Livewire\Component;

class PropertyEnquiryManagementComponent extends Component
{

    public $enquiry;
    public $property_id;

    public function rules(){
        return [
            'enquiry.name' => 'required',
            'enquiry.email' => 'required',
            'enquiry.phone' => 'required',
            'enquiry.message' => 'required',

        ];
    }
    public function mount($property_id)
    {
        $this->enquiry = new PropertyEnquiry();
        $this->property_id= $property_id;

    }
    public function saveEnquiry()
    {

        $this->validate();
        $this->enquiry->property_id=$this->property_id;
        $this->enquiry->save();

        $this->dispatch('success-box', message: 'Enquiry Sent successfully');
    }
    public function render()
    {
        return view('livewire.admin.property-enquiry.property-enquiry-management-component');
    }
}
