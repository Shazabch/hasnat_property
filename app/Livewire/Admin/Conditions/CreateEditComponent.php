<?php

namespace App\Livewire\Admin\Conditions;

use App\Models\Condition;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

use function Pest\Laravel\delete;

class CreateEditComponent extends Component
{
    use WithFileUploads;
    public $condition;
    public $isNew = false;
    public $image;
    public $detail_icon;
    
    public function mount($condition = null)
    {
        $this->condition = $condition ?? new Condition(['status' => '0']);
        $this->isNew = $condition ? false : true;
        
    }

    public function rules()
    {
        return [
            'condition.title' => 'required',
            'condition.slug' => 'required|unique:conditions,slug,' . $this->condition->id,
            'condition.short_description' => 'nullable',
            'condition.status' => 'required',
            'condition.published_at' => 'nullable',
            'condition.meta_title' => 'nullable',
            'condition.meta_description' => 'nullable',
            'condition.meta_keywords' => 'nullable',
            'condition.image_alt' => 'nullable',
            'condition.image' => 'nullable',
            'condition.detail_icon' => 'nullable',
        ];
    }

    public function updatingConditionTitle($value)
    {
        if($this->isNew){
            $this->condition->slug = Str::slug($value);
        }
        $this->validateOnly('condition.slug');
    }

    public function save()
    {
        $this->validate();

        if($this->image){
            deleteFile($this->condition->image);
            $this->condition->image = 'storage/' . $this->image->store('conditions', 'public');
        }

        if($this->detail_icon){
            deleteFile($this->condition->detail_icon);
            $this->condition->detail_icon = 'storage/' . $this->detail_icon->store('conditions', 'public');
        }

        if($this->isNew){
            $this->condition->created_by_user = auth()->user()->id;
            $this->condition->save();
            $this->dispatch('success-box', message: 'Condition saved successfully');
            return redirect()->route('admin.conditions.edit', $this->condition->id);
        }else{
            $this->condition->updated_by_user = auth()->user()->id;
            $this->condition->save();
            $this->dispatch('success-box', message: 'Condition updated successfully');
        }

        $this->image = null;
    }

   

    public function render()
    {
        return view('livewire.admin.conditions.create-edit-component');
    }

    public function downloadImage(){
        return response()->download(public_path($this->condition->image));
    }

    public function deleteImage(){
        deleteFile($this->condition->image);
        $this->condition->image = null;
        $this->condition->save();
        $this->dispatch('success-notification',message: 'Image deleted successfully');
    }
}
