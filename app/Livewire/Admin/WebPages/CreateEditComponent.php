<?php

namespace App\Livewire\Admin\WebPages;

use App\Models\WebPage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateEditComponent extends Component
{
    use WithFileUploads;

    public $webPage;
    public $isNew = false;
    public $image;
    
    public function mount($webPage = null)
    {
        $this->webPage = $webPage ?? new WebPage();
        $this->isNew = $webPage ? false : true;
    }

    public function rules()
    {
        return [
            'webPage.meta_title' => 'required',
            'webPage.meta_description' => 'nullable',
            'webPage.slug' => 'required|unique:web_pages,slug,' . $this->webPage->id,
            'webPage.image' => 'nullable',
            'webPage.image_alt' => 'nullable',
        ];
    }

    public function updatedWebPageMetaTitle($value)
    {
        if($this->isNew){
            $this->webPage->slug = Str::slug($value);
        }
    }

    public function save()
    {
        $this->validate();

        if($this->image){
            deleteFile($this->webPage->image);
            $this->webPage->image = 'storage/' . $this->image->store('web_pages', 'public');
        }

        if($this->isNew){
            $this->webPage->save();
            $this->dispatch('success-box', message: 'Web page saved successfully');
            return redirect()->route('admin.web-pages.edit', $this->webPage->id);
        } else {
            $this->webPage->save();
            $this->dispatch('success-box', message: 'Web page updated successfully');
        }

        $this->image = null;
    }

    public function render()
    {
        return view('livewire.admin.web-pages.create-edit-component');
    }

    public function downloadImage(){
        return response()->download(public_path($this->webPage->image));
    }

    public function deleteImage(){
        deleteFile($this->webPage->image);
        $this->webPage->image = null;
        $this->webPage->save();
        $this->dispatch('success-notification', message: 'Image deleted successfully');
    }
}