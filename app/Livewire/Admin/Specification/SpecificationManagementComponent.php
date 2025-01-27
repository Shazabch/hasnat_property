<?php

namespace App\Livewire\Admin\Specification;

use App\Models\Specification;
use Livewire\Component;
use Livewire\WithPagination;

class SpecificationManagementComponent extends Component
{
    use WithPagination;

    public $specificationModel;
    public $name;
    public $icon;
    public $is_active;
    public $specification_id = null;
    public $search = '';
    public $perPage = 10;

    public function rules()
    {
        return [
            'name' => 'required',
            'icon' => 'required',
            'is_active' => 'required',
        ];
    }


    public function mount()
    {
        $this->specificationModel = new Specification();
    }




    public function addNew()
    {
        $this->resetInputFields();
    }


    public function editItem($id)
    {
        $this->specificationModel = Specification::find($id);
        $this->specification_id = $this->specificationModel->id;
        $this->name = $this->specificationModel->name;
        $this->icon = $this->specificationModel->icon;
        $this->is_active = $this->specificationModel->is_active;
    }


    public function deleteSpecification($id)
    {
        $specification = Specification::find($id);

        if ($specification) {
            $specification->delete();
            $message = 'Specification deleted successfully.';
        } else {
            $message = 'Specification not found.';
        }

        // Dispatching the success message
        $this->dispatch('success-box', ['message' => $message]);
    }


    public function addEntry()
    {
        $this->validate();

        if ($this->specification_id) {
            $specification = Specification::find($this->specification_id);
        } else {
            $specification = new Specification();
        }

        $specification->name = $this->name;
        $specification->icon = $this->icon;
        $specification->is_active = $this->is_active;
        $specification->save();

        $this->resetInputFields();
        // $this->dispatchBrowserEvent('close-modal', ['id' => 'specificationComponentModal']);
        $message = $this->specification_id ? 'Specification updated successfully' : 'Specification added successfully';
    $this->dispatch('success-box', ['message' => $message]);
    }


    private function resetInputFields()
    {
        $this->name = '';
        $this->icon = '';
        $this->is_active = '';
        $this->specification_id = null;
    }



    public function render()
    {

        $specifications = Specification::where('id', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage);

        return view('livewire.admin.specification.specification-management-component' , [
            'specifications' => $specifications,
        ]);
    }
}
