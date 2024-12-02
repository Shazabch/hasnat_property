<?php

namespace App\Livewire\Admin\Publications;

use Livewire\Component;
use App\Models\PublicationType;
use Livewire\WithPagination;

class TypeManagementComponent extends Component
{
    use WithPagination;

    public $name;
    public $editing = false;
    public $editingId;

    protected $rules = [
        'name' => 'required|string|max:255|unique:publication_types,name',
    ];

    public function render()
    {
        $types = PublicationType::paginate(10);
        return view('livewire.admin.publications.type-management-component', compact('types'));
    }

    public function save()
    {
        $this->validate();

        if ($this->editing) {
            $type = PublicationType::find($this->editingId);
            $type->update(['name' => $this->name]);
        } else {
            PublicationType::create(['name' => $this->name]);
        }

        $this->reset(['name', 'editing', 'editingId']);
        session()->flash('message', $this->editing ? 'Type updated successfully.' : 'Type created successfully.');
    }

    public function edit($id)
    {
        $type = PublicationType::find($id);
        $this->name = $type->name;
        $this->editing = true;
        $this->editingId = $id;
    }

    public function delete($id)
    {
        PublicationType::destroy($id);
        session()->flash('message', 'Type deleted successfully.');
    }

    public function cancel()
    {
        $this->reset(['name', 'editing', 'editingId']);
    }
}