<?php


namespace App\Livewire\Admin\Amenetise;

use App\Models\Amenities;
use Livewire\Component;
use Livewire\WithPagination;

class AmenitiseManagementComponent extends Component
{
    use WithPagination;

    public $amentiseModel;
    public $name;
    public $icon;
    public $is_active;
    public $amentise_id = null;
    public $search = '';
    public $perPage = 10;

    public $icons = [
        'fas fa-school' => 'School',
        'fas fa-store' => 'Super Market',
        'fas fa-pills' => 'Pharmacy',
        'fas fa-university' => 'Bank',
        'fas fa-hospital' => 'Hospital',
    ];

    public function rules()
    {
        return [
            'name' => 'required',
            'icon' => 'required',
            'is_active' => 'required|boolean',
        ];
    }

    public function mount()
    {
        $this->amentiseModel = new Amenities();
    }

    public function addNew()
    {
        $this->resetInputFields();
    }

    public function editItem($id)
    {
        $this->amentiseModel = Amenities::find($id);
        $this->amentise_id = $this->amentiseModel->id;
        $this->name = $this->amentiseModel->name;
        $this->icon = $this->amentiseModel->icon;
        $this->is_active = $this->amentiseModel->is_active;
    }

    public function deleteAmentise($id)
    {
        $amentise = Amenities::find($id);

        if ($amentise) {
            $amentise->delete();
            $message = 'Amentise deleted successfully.';
        } else {
            $message = 'Amentise not found.';
        }

        $this->dispatch('success-box', ['message' => $message]);
    }

    public function addEntry()
    {
        $this->validate();

        if ($this->amentise_id) {
            $amentise = Amenities::find($this->amentise_id);
        } else {
            $amentise = new Amenities();
        }

        $amentise->name = $this->name;
        $amentise->icon = $this->icon;
        $amentise->is_active = $this->is_active;
        $amentise->save();

        $this->resetInputFields();
        $message = $this->amentise_id ? 'Amentise updated successfully' : 'Amentise added successfully';
        $this->dispatch('success-box', ['message' => $message]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->icon = '';
        $this->is_active = '';
        $this->amentise_id = null;
    }

    public function render()
    {
        $amentises = Amenities::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('id', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage);

        return view('livewire.admin.amenetise.amenitise-management-component', [
            'amentises' => $amentises,
        ]);
    }
}

