<?php

namespace App\Livewire\Admin\Publications;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Publication;
use App\Models\PublicationAuthor;
use App\Models\PublicationTopic;
use App\Models\PublicationType;

class CreateEditComponent extends Component
{
    use WithFileUploads;
    public $publication;
    public $isNew = false;
    public $image;
    public $types=[];
    public $authors=[];
    public $selectedTopics=[];
    public function mount($publication = null)
    {
        $this->publication = $publication ?? new Publication(['status' => '0']);
        $this->isNew = $publication ? false : true;
        $this->types = PublicationType::all();
        $this->authors = PublicationAuthor::all();

        // if(!$this->isNew){
        //     $this->selectedTopics[] = $this->publication->topics->map(function($result){
        //         return [
        //             'id'=>'id_'.$result->id,
        //             'text'=>$result->name,
        //         ];
        //     })->toArray();
        // }
    }

    public function rules()
    {
        return [
            'publication.title' => 'required',
            'publication.slug' => 'required|unique:publications,slug,' . $this->publication->id,
            'publication.status' => 'required',
            'publication.published_at' => 'nullable',
            'publication.meta_title' => 'nullable',
            'publication.meta_description' => 'nullable',
            'publication.image_alt' => 'nullable',
            'publication.image' => 'nullable',

        ];
    }

    public function updatingPublicationTitle($value)
    {
        if($this->isNew){
            $this->publication->slug = Str::slug($value);
        }
        $this->validateOnly('publication.slug');
    }

    public function save()
    {
        if($this->publication->type_id == ''){
            $this->publication->type_id = null;
        }
        if($this->publication->author_id == ''){
            $this->publication->author_id = null;
        }
        $this->validate();

        if($this->image){
            deleteFile($this->publication->image);
            $this->publication->image = 'storage/' . $this->image->store('publications', 'public');
        }

        // get only selected topis which starts with id_
        $existingTopics = collect($this->selectedTopics)->filter(function($topic){
            return str_starts_with($topic, 'id_');
        })->map(function($topic){
            return str_replace('id_', '', $topic);
        });
        // get all others without id_
        $newTopics = collect($this->selectedTopics)->filter(function($topic){
            return !str_starts_with($topic, 'id_');
        });

        foreach($newTopics as $topic){
            $newTopic = PublicationTopic::firstOrCreate(['name' => $topic]);
            $existingTopics->push($newTopic->id);
        }

        // remove duplicates
        $existingTopics = $existingTopics->unique();



        if($this->isNew){
            $this->publication->created_by_user = auth()->user()->id;
            $this->publication->save();
            $this->publication->topics()->sync($existingTopics);
            $this->dispatch('success-box', message: 'Publication saved successfully');
            return redirect()->route('admin.publications.edit', $this->publication->id);
        }else{
            $this->publication->updated_by_user = auth()->user()->id;
            $this->publication->save();
            $this->publication->topics()->sync($existingTopics);
            $this->dispatch('success-box', message: 'Publication updated successfully');
        }


        $this->image = null;
    }

    public function render()
    {
        return view('livewire.admin.publications.create-edit-component');
    }

    public function downloadImage(){
        return response()->download(public_path($this->publication->image));
    }

    public function deleteImage(){
        deleteFile($this->publication->image);
        $this->publication->update(['image' => null]);
        $this->dispatch('success-notification',message: 'Image deleted successfully');
    }
}
