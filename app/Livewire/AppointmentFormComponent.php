<?php

namespace App\Livewire;

use App\Mail\AppointmentAdminMail;
use App\Models\AppointmentRequest;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class AppointmentFormComponent extends Component
{
    public $appointmentRequest;
    public $success = false;
    public $fromPage;

    protected $rules = [
        'appointmentRequest.name' => 'required',
        'appointmentRequest.email' => 'required|email',
        'appointmentRequest.phone' => 'required',
        'appointmentRequest.message' => 'required',
    ];

    protected $messages = [
        'appointmentRequest.name.required' => 'Please enter your name',
        'appointmentRequest.email.required' => 'Please enter your email',
        'appointmentRequest.email.email' => 'Email is invalid',
        'appointmentRequest.phone.required' => 'Please enter your phone number',
        'appointmentRequest.message.required' => 'Please enter your message',
    ];

    public function mount()
    {
        $this->appointmentRequest = new AppointmentRequest();
    }

    public function save()
    {
        $this->validate();
        $this->appointmentRequest->page = $this->fromPage;
        $this->appointmentRequest->save();
        Mail::to('malikpa@hcaconsultant.co.uk')->cc('logs@mspine.uk')->send(new AppointmentAdminMail($this->appointmentRequest));
        $this->appointmentRequest = new AppointmentRequest();
        $this->success = true;
    }

    public function render()
    {
        return view('livewire.appointment-form-component');
    }
}
