<?php

namespace App\Livewire;

use App\Models\Publication;
use App\Models\PublicationTopic;
use App\Models\PublicationType;
use Livewire\Component;

class PublicationsListingComponent extends Component
{
    public $search = '';
    public $publications = [];
    public $topics = [];
    public $types = [];

    public $selectedTopic;
    public $selectedType;

    protected $queryString = ['search'=>[
        'except' => '',
    ], 'selectedTopic'=>[
        'except' => null,
        'as' => 'topic',
    ], 'selectedType'=>[
        'except' => null,
        'as' => 'type',
    ]];

    public function updatedSearch()
    {
        $this->loadPublications();
    }

    public function loadFilters()
    {
        $this->topics = PublicationTopic::whereHas('publications')->get();
        $this->types = PublicationType::whereHas('publications')->get();
    }

    public function updatedSelectedTopic($value)
    {
        $this->loadPublications();
    }

    public function updatedSelectedType($value)
    {
        $this->loadPublications();
    }

    public function loadFirstTime()
    {
        $this->loadFilters();
        $this->loadPublications();
    }

    public function loadPublications()
    {
        $query = Publication::query();

        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

        if ($this->selectedTopic) {
            $query->whereHas('topics', function ($query) {
                $query->where('publication_topics.id', $this->selectedTopic);
            });
        }

        if ($this->selectedType) {
            $query->whereHas('type', function ($query) {
                $query->where('publication_types.id', $this->selectedType);
            });
        }

        $this->publications = $query->published()->get();
    }

    public function render()
    {
        return view('livewire.publications-listing-component');
    }
}