<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateEditComponent extends Component
{
    use WithFileUploads;

    public $project;
    public $isNew = false;
    public $image;

    public function mount($project = null)
    {
        $this->project = $project ?? new Project(['status' => '1']);
        $this->isNew = $project ? false : true;
    }

    public function rules()
    {
        return [
            'project.title' => 'required',
            'project.slug' => 'required|unique:projects,slug,' . $this->project->id,
            'project.description' => 'required',
            'project.status' => 'required',
            'project.image' => 'nullable',
            'project.image_alt' => 'nullable',
            'project.content' => 'nullable|string',
        ];
    }
    public function updatingProjectTitle($value)
    {
        if ($this->isNew) {
            $this->project->slug = Str::slug($value);
        }
        $this->validateOnly('project.slug');
    }

    public function save($redirect = false)
    {
        $this->validate();

        if ($this->image) {
            deleteFile($this->project->image);
            $this->project->image = 'storage/' . $this->image->store('projects', 'public');
        }

        if ($this->isNew) {
            $this->project->save();
            $this->dispatch('success-box', message: 'Project saved successfully');
            if($redirect){
                return redirect()->route('admin.projects.create');
            }else{
                return redirect()->route('admin.projects.edit', $this->project->id);
            }
        } else {
            $this->project->save();
            $this->dispatch('success-box', message: 'Project updated successfully');
        }

        $this->image = null;
    }


    public function render()
    {
        return view('livewire.admin.projects.create-edit-component');
    }

    public function downloadImage(){
        return response()->download(public_path($this->project->image));
    }

    public function deleteImage(){
        deleteFile($this->project->image);
        $this->project->update(['image' => null]);
        $this->dispatch('success-notification',message: 'Image deleted successfully');
    }
}
