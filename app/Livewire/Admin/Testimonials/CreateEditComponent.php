<?php

namespace App\Livewire\Admin\Testimonials;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateEditComponent extends Component
{
    use WithFileUploads;

    public $testimonial;
    public $isNew = false;
    public $image;

    public function mount($testimonial = null)
    {
        $this->testimonial = $testimonial ?? new Testimonial(['status' => '1','rating' => 5]);
        $this->isNew = $testimonial ? false : true;
    }

    public function rules()
    {
        return [
            'testimonial.name' => 'required',
            'testimonial.description' => 'required',
            'testimonial.rating' => 'required|integer|min:1|max:5',
            'testimonial.status' => 'required',
            'testimonial.image' => 'nullable',
            'testimonial.image_alt' => 'nullable',
        ];
    }

    public function save($redirect = false)
    {
        $this->validate();

        if ($this->image) {
            deleteFile($this->testimonial->image);
            $this->testimonial->image = 'storage/' . $this->image->store('testimonials', 'public');
        }

        if ($this->isNew) {
            $this->testimonial->save();
            $this->dispatch('success-box', message: 'Testimonial saved successfully');
            if($redirect){
                return redirect()->route('admin.testimonials.create');
            }else{
                return redirect()->route('admin.testimonials.edit', $this->testimonial->id);
            }
        } else {
            $this->testimonial->save();
            $this->dispatch('success-box', message: 'Testimonial updated successfully');
        }

        $this->image = null;
    }
    

    public function render()
    {
        return view('livewire.admin.testimonials.create-edit-component');
    }

    public function downloadImage(){
        return response()->download(public_path($this->testimonial->image));
    }

    public function deleteImage(){
        deleteFile($this->testimonial->image);
        $this->testimonial->update(['image' => null]);
        $this->dispatch('success-notification',message: 'Image deleted successfully');
    }
}
