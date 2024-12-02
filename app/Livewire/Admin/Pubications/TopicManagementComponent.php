<?php

namespace App\Livewire\Admin\Pubications;

use Livewire\Component;
use App\Models\PublicationTopic;
use Livewire\WithPagination;

class TopicManagementComponent extends Component
{
    use WithPagination;

    public $name;
    public $editingTopicId;

    protected $rules = [
        'name' => 'required|min:3',
    ];

    public function render()
    {
        $topics = PublicationTopic::withCount('publications')->paginate(10);
        return view('livewire.admin.pubications.topic-management-component', compact('topics'));
    }

    public function create()
    {
        $this->validate();

        PublicationTopic::create([
            'name' => $this->name,
        ]);

        $this->reset(['name']);
        session()->flash('message', 'Topic created successfully.');
    }

    public function edit($id)
    {
        $topic = PublicationTopic::findOrFail($id);
        $this->editingTopicId = $id;
        $this->name = $topic->name;
    }

    public function update()
    {
        $this->validate();

        $topic = PublicationTopic::findOrFail($this->editingTopicId);
        $topic->update([
            'name' => $this->name,
        ]);

        $this->reset(['name', 'editingTopicId']);
        session()->flash('message', 'Topic updated successfully.');
    }

    public function delete($id)
    {
        PublicationTopic::findOrFail($id)->delete();
        session()->flash('message', 'Topic deleted successfully.');
    }
}