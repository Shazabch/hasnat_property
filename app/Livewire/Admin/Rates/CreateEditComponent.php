<?php

namespace App\Livewire\Admin\Rates;

use App\Models\Rate;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateEditComponent extends Component
{
    use WithFileUploads;

    public $rate;
    public $isNew = false;
    public $image;

    public function mount($rate = null)
    {
        $this->rate = $rate ?? new rate(['status' => '1']);
        $this->isNew = $rate ? false : true;
    }

    public function rules()
    {
        return [
            'rate.title' => 'required',
            'rate.slug' => 'required|unique:rates,slug,' . $this->rate->id,
            'rate.status' => 'required',
            'rate.content' => 'nullable|string',
        ];
    }
    public function updatingRateTitle($value)
    {
        if ($this->isNew) {
            $this->rate->slug = Str::slug($value);
        }
        $this->validateOnly('rate.slug');
    }

    public function save($redirect = false)
    {
        $this->validate();

        if ($this->image) {
            deleteFile($this->rate->image);
            $this->rate->image = 'storage/' . $this->image->store('rates', 'public');
        }

        if ($this->isNew) {
            $this->rate->save();
            $this->dispatch('success-box', message: 'Rate saved successfully');
            if($redirect){
                return redirect()->route('admin.rates.create');
            }else{
                return redirect()->route('admin.rates.edit', $this->rate->id);
            }
        } else {
            $this->rate->save();
            $this->dispatch('success-box', message: 'Rate updated successfully');
        }

        $this->image = null;
    }


    public function render()
    {
        return view('livewire.admin.rates.create-edit-component');
    }

    public function downloadImage(){
        return response()->download(public_path($this->rate->image));
    }

    public function deleteImage(){
        deleteFile($this->rate->image);
        $this->rate->update(['image' => null]);
        $this->dispatch('success-notification',message: 'Image deleted successfully');
    }
}
