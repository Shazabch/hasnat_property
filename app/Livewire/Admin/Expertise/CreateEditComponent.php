<?php

namespace App\Livewire\Admin\Expertise;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Expertise;
use Illuminate\Support\Facades\Auth;

class CreateEditComponent extends Component
{
    use WithFileUploads;
    public $expertise;
    public $isNew = false;
    public $image;
    public $detail_icon;
    
    public function mount($expertise = null)
    {
        $this->expertise = $expertise ?? new Expertise(['status' => '0']);
        $this->isNew = $expertise ? false : true;
    }

    public function rules()
    {
        return [
            'expertise.title' => 'required',
            'expertise.slug' => 'required|unique:expertises,slug,' . $this->expertise->id,
            'expertise.short_description' => 'nullable|max:1000',
            'expertise.status' => 'required',
            'expertise.published_at' => 'nullable|date',
            'expertise.meta_title' => 'nullable',
            'expertise.meta_description' => 'nullable',
            'expertise.description' => 'nullable',
            'expertise.meta_keywords' => 'nullable',
            'expertise.image_alt' => 'nullable',
            'expertise.image' => 'nullable',
            'expertise.icon' => 'nullable',
            'expertise.tagline' => 'nullable',
            'expertise.flip_card_description' => 'nullable',
            'expertise.show_on_dashboard' => 'nullable|boolean',
            'expertise.detail_icon' => 'nullable',
        ];
    }

    public function updatingExpertiseTitle($value)
    {
        if($this->isNew){
            $this->expertise->slug = Str::slug($value);
        }
        $this->validateOnly('expertise.slug');
    }

    public function save()
    {
        $this->validate();

        $this->expertise->show_on_dashboard = $this->expertise->show_on_dashboard ? 1 : 0;
        $this->expertise->status = $this->expertise->status ? 1 : 0;
        if($this->image){
            deleteFile($this->expertise->image);
            $this->expertise->image = 'storage/' . $this->image->store('expertises', 'public');
        }

        if($this->detail_icon){
            deleteFile($this->expertise->detail_icon);
            $this->expertise->detail_icon = 'storage/' . $this->detail_icon->store('expertises', 'public');
        }

        if($this->isNew){
            $this->expertise->created_by_user = Auth::id();
            $this->expertise->save();
            $this->dispatch('success-box', message: 'Expertise saved successfully');
            return redirect()->route('admin.expertise.edit', $this->expertise->id);
        }else{
            $this->expertise->updated_by_user = Auth::id();
            $this->expertise->save();
            $this->dispatch('success-box', message: 'Expertise updated successfully');
        }

        $this->image = null;
    }

    public function render()
    {
        return view('livewire.admin.expertise.create-edit-component');
    }

    public function downloadImage(){
        return response()->download(public_path($this->expertise->image));
    }

    public function deleteImage(){
        deleteFile($this->expertise->image);
        $this->expertise->update(['image' => null]);
        $this->dispatch('success-notification',message: 'Image deleted successfully');
    }
}
