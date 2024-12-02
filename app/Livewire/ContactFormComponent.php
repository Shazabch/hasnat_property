<?php

namespace App\Livewire;

use App\Mail\EnquiryAdminMail;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactFormComponent extends Component
{
    public $enquiry;
    public $success = false;

    public function mount()
    {
        $this->enquiry = new Enquiry();
    }

    protected $rules = [
        'enquiry.name' => 'required',
        'enquiry.email' => 'required|email',
        'enquiry.phone' => 'required',
        'enquiry.message' => 'required',
    ];

    protected $messages = [
        'enquiry.name.required' => 'Please enter your name',
        'enquiry.email.required' => 'Please enter your email',
        'enquiry.email.email' => 'Email must be a valid email address',
        'enquiry.phone.required' => 'Please enter your phone number',
        'enquiry.message.required' => 'Please enter your message',
    ];

    public function save()
    {
        $this->success = false;
        $this->validate();
        $this->enquiry->save();
        Mail::to('malikpa@hcaconsultant.co.uk')->cc('logs@mspine.uk')->send(new EnquiryAdminMail($this->enquiry));
        $this->success = true;
        $this->enquiry = new Enquiry();
    }

    public function render()
    {
        return view('livewire.contact-form-component');
    }
}
