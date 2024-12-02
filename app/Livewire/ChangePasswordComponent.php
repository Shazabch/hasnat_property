<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordComponent extends Component
{
    public $oldPassword;
    public $newPassword;
    public $confirmPassword;

    protected $rules = [
        'oldPassword' => 'required',
        'newPassword' => 'required|min:5',
        'confirmPassword' => 'required|min:5',
    ];

    public function changePassword()
    {
        $this->validate();

        if($this->newPassword !== $this->confirmPassword){
            $this->addError('confirmPassword', 'confirm password not matched');
        }

        $user = Auth::user();

        if (!Hash::check($this->oldPassword, $user->password)) {
            $this->addError('oldPassword', 'The old password is incorrect.');
            return;
        }

        $user->update([
            'password' => Hash::make($this->newPassword),
        ]);

        session()->flash('success', 'Password changed successfully.');
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->oldPassword = '';
        $this->newPassword = '';
        $this->confirmPassword = '';
    }

    public function render()
    {
        return view('livewire.change-password-component');
    }
}
