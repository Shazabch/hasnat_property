<?php

namespace App\Livewire\Admin\Schemas;

use App\Models\PageSchema;
use Livewire\Component;

class CreateEditComponent extends Component
{
    public $schema;
    public $schemaable_type;
    public $schemaable_id;

    protected $rules = [
        'schema.schema' => 'nullable',
    ];

    protected $listeners = [
        'loadSchema' => 'loadSchema',
    ];

    public function mount($schemaable_type=null, $schemaable_id=null)
    {
        $this->loadSchema($schemaable_type, $schemaable_id);  
    }

    public function loadSchema($schemaable_type=null, $schemaable_id=null)
    {
        $this->resetErrorBag();
        $this->schemaable_type = $schemaable_type;
        $this->schemaable_id = $schemaable_id;

        $rec = PageSchema::where('schemaable_type', $this->schemaable_type)
            ->where('schemaable_id', $this->schemaable_id)
            ->first();
        if($rec) {
            $this->schema = $rec;
        }else{
            $this->schema = null;
        }
    }

    public function create()
    {
        if($this->schemaable_id && $this->schemaable_type) {
            $this->schema = PageSchema::createOrFirst([
                'schemaable_type' => $this->schemaable_type,
                'schemaable_id' => $this->schemaable_id,
                'schema' => null,
            ]);
        }else{
            $this->dispatch('error-notification', message: 'Schemaable ID or Type is missing!');
        }
    }

    public function save()
    {
        $this->validate();

        $this->schema->save();

        $this->dispatch('success-notification', message: 'Schema Updated!');
        // add a message to the session
        session()->flash('success', 'Schema Updated!');
    }

    public function render()
    {
        return view('livewire.admin.schemas.create-edit-component');
    }
}
