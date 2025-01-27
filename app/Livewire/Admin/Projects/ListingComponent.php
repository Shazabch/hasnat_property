<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ListingComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $enableReorder = false;
    public $status = '';

    protected $queryString = ['search', 'status'];

    public function render()
    {
        $projects = Project::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->when($this->status != '', function ($query) {
                $query->where('status', $this->status);
            })
            ->ordered()
            ->paginate(10);

        return view('livewire.admin.projects.listing-component', [
            'projects' => $projects,
        ]);
    }

    public function toggleReorder()
    {
        $this->enableReorder = !$this->enableReorder;
    }

    public function delete($id)
    {
        $project = Project::find($id);
        if($project){
            $project->delete();
            $this->dispatch('success-box', message: 'Project deleted successfully');
        }
    }

    public function updateOrder($items)
    {
        foreach ($items as $item) {
            Project::find($item['value'])->update(['order' => $item['order']]);
        }

        $this->dispatch('success-notification', message: 'order updated');
    }
}
