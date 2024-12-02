<?php

namespace App\Livewire\Admin\Publications;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PublicationAuthor;
use Livewire\WithPagination;
use Illuminate\Support\Str;
class AuthorManagementComponent extends Component
{
    use WithFileUploads, WithPagination;

    public $name;
    public $profession;
    public $image;
    public $bio;
    public $facebook;
    public $twitter;
    public $instagram;
    public $linkedin;
    public $youtube;
    public $author_image;
    public $editingAuthorId;
    public $slug;
    protected $rules = [
        'name' => 'required|string|max:255',
        'profession' => 'required|string|max:255',
        'image' => 'nullable|image|max:1024', // 1MB Max
        'bio' => 'nullable|string',
        'facebook' => 'nullable|string|url',
        'twitter' => 'nullable|string|url',
        'instagram' => 'nullable|string|url',
        'linkedin' => 'nullable|string|url',
        'youtube' => 'nullable|string|url',
        'slug' => 'required|string|max:255',
    ];

    public function render()
    {
        $authors = PublicationAuthor::paginate(10);
        return view('livewire.admin.publications.author-management-component', compact('authors'));
    }

    // update slug
    public function updatedName($value)
    {
       if(!$this->editingAuthorId){
            $this->slug = Str::slug($value);
        }
    }

    public function create()
    {
        $this->validate();

        $imagePath = $this->image ? 'storage/' . $this->image->store('authors', 'public') : null;

        PublicationAuthor::create([
            'name' => $this->name,
            'profession' => $this->profession,
            'image' => $imagePath,
            'bio' => $this->bio,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'linkedin' => $this->linkedin,
            'youtube' => $this->youtube,
            'slug' => $this->slug,
        ]);

        $this->reset(['name', 'profession', 'image']);
        session()->flash('message', 'Author created successfully.');
        $this->dispatch('clear-filepond-files');
    }

    public function edit($id)
    {
        $author = PublicationAuthor::findOrFail($id);
        $this->editingAuthorId = $id;
        $this->name = $author->name;
        $this->profession = $author->profession;
        $this->author_image = $author->image;
        $this->bio = $author->bio;
        $this->facebook = $author->facebook;
        $this->twitter = $author->twitter;
        $this->instagram = $author->instagram;
        $this->linkedin = $author->linkedin;
        $this->youtube = $author->youtube;
        $this->slug = $author->slug;
    }

    public function update()
    {
        $this->validate();

        $author = PublicationAuthor::findOrFail($this->editingAuthorId);

        $imagePath = $this->image ? 'storage/' . $this->image->store('authors', 'public') : $author->image;

        if($this->image){
            deleteFile($this->author_image);
        }

        $author->update([
            'name' => $this->name,
            'profession' => $this->profession,
            'image' => $imagePath,
            'bio' => $this->bio,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'linkedin' => $this->linkedin,
            'youtube' => $this->youtube,
            'slug' => $this->slug,
        ]);

        $this->reset(['editingAuthorId', 'name', 'profession', 'image', 'author_image', 'slug']);
        session()->flash('message', 'Author updated successfully.');
        $this->dispatch('clear-filepond-files');
    }

    public function delete($id)
    {
        $author = PublicationAuthor::findOrFail($id);
        $author->delete();
        session()->flash('message', 'Author deleted successfully.');
    }

    public function deleteImage()
    {
    if ($this->author_image) {
        // Delete the file from storage
        deleteFile($this->author_image);
        
        // Update the author record
        $author = PublicationAuthor::find($this->editingAuthorId);
            $author->image = null;
            $author->save();
            
            // Reset the component property
            $this->author_image = null;
            
            session()->flash('message', 'Author image has been deleted.');
        }
    }
}
