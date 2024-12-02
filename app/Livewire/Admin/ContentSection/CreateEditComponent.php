<?php

namespace App\Livewire\Admin\ContentSection;

use Livewire\Component;
use Livewire\WithFileUploads;
class CreateEditComponent extends Component
{
    use WithFileUploads;
    public $contentSection;
    public $image;
    public $image_positions=[];
    public $bg_types=[];
    public $showInCard = false;

   

    public function mount()
    {
       $this->image_positions =[
           ''=>'Select',
           'right'=>'Right',
           'left'=>'Left',
           'full_after'=>'Full Width After',
       ];
       $this->bg_types =[
           ''=>'None',
           'white'=>'White',
           'dark'=>'Dark',
           'accent'=>'Accent',
       ];
    }

    public function rules()
    {
        return [
            'contentSection.title' => 'nullable',
            'contentSection.tab_heading' => 'nullable',
            'contentSection.status' => 'nullable',
            'contentSection.image' => 'nullable',
            'contentSection.image_alt' => 'nullable',
            'contentSection.image_position' => 'nullable',
            'contentSection.bg_type' => 'nullable',
            'contentSection.content' => 'nullable',
        ];
    }

    public function save(){
        $this->validate();
        if($this->image){
            deleteFile($this->contentSection->image);
            $this->contentSection->image = 'storage/'.$this->image->store('content-sections', 'public');
        }
        $this->contentSection->save();
        $this->image = null;
        $this->dispatch('clear-filepond-files');
        $this->dispatch('success-notification',message: 'Content saved successfully');
    }

    public function render()
    {
        return view('livewire.admin.content-section.create-edit-component');
    }

    public function downloadImage(){
        // download the image public link
        return response()->download( 
            public_path($this->contentSection->image)
        );
    }

    public function deleteImage(){
        deleteFile($this->contentSection->image);
        $this->contentSection->update(['image' => null]);
        $this->dispatch('success-notification',message: 'Image deleted successfully');
    }
}
