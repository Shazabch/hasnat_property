<?php

namespace App\Livewire\Admin\TeamSection;

use App\Models\TeamSection;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class TeamManagementComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $team;
    public $image;

    public function rules()
    {
        return [
            'team.name' => 'required',
            'image' => 'nullable',
            'team.designation' => 'required',
        ];
    }

    public function mount()
    {
        $this->team = new TeamSection();
    }

    public function addNew()
    {
        $this->resetInputFields();
        $this->dispatch('open-modal');
    }

    public function editItem($id)
    {
        $this->team = TeamSection::find($id);
    }

    public function deleteTeam($id)
    {
        $team = TeamSection::find($id);
        if ($team->image) {
            \Illuminate\Support\Facades\Storage::delete(str_replace('storage/', 'public/', $team->image));
        }

        $team->delete();
        $this->dispatch('success-box', ['message' => 'Team member deleted successfully']);
    }

    public function addEntry()
    {
        $this->validate();

        if ($this->team->id) {
            $team = TeamSection::find($this->team->id);
            $message = 'Team member updated successfully';
        } else {
            $team = new TeamSection();
            $message = 'Team member added successfully';
        }

        $team->name = $this->team->name;
        $team->designation = $this->team->designation;

        // Handle image upload if a new image is selected
        if ($this->image) {
            $imagePath = $this->image->store('team', 'public');
            $team->image = 'storage/' . $imagePath;
        }

        $team->save();
        $this->resetInputFields();
        $this->dispatch('close-modal');
        $this->dispatch('success-box', ['message' => $message]);
        
    }

    public function resetInputFields()
    {
        $this->team = new TeamSection();
        $this->image = null;
    }

    public function render()
    {
        return view('livewire.admin.team-section.team-management-component', [
            'teams' => TeamSection::paginate(10)
        ]);
    }
}
