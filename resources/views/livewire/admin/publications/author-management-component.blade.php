<div class="">
    
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card mb-2">
    <div class="card-body">
        <form wire:submit.prevent="{{ $editingAuthorId ? 'update' : 'create' }}">
            <div class="row">
                <div class="col-md-6">
                    
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control form-control-sm" id="name" wire:model.blur="name">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control form-control-sm" id="slug" wire:model.blur="slug">
                @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
            </div>


            <div class="mb-3">
                <label for="profession" class="form-label">Profession</label>
                <input type="text" class="form-control form-control-sm" id="profession" wire:model="profession">
                @error('profession') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <textarea class="form-control form-control-sm" id="bio" wire:model="bio"></textarea>
                @error('bio') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
               <div class="row">
                @if($editingAuthorId && $image)
                    <div class="mb-3 col-4">
                        <img src="{{ $image->temporaryUrl() }}" alt="Author Image" class="img-fluid" style="width: 100px; height: 100px;">
                    </div>
                @elseif($editingAuthorId && $author_image)
                    <div class="mb-3 col-4">
                        <img src="{{ asset($author_image) }}" alt="Author Image" class="img-fluid" style="width: 100px; height: 100px;">
                        <button type="button" class="btn btn-sm btn-danger mt-2" wire:confirm="Are you sure you want to delete this image?" wire:click="deleteImage">Delete Image</button>
                    </div>
                @endif
                <div class="mb-3 col">
                    <x-filepond-input wire:model="image" allowImagePreview imagePreviewMaxHeight="50" multiple
                allowFileTypeValidation
                acceptedFileTypes="['image/*']"
                allowFileSizeValidation maxFileSize="20mb" id="author_image" />
                </div>
               </div>
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
           
            
        
                </div>
                <div class="col-md-6">
                    
                    <div class="mb-3">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control form-control-sm" id="facebook" wire:model="facebook">
                        @error('facebook') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="twitter" class="form-label">Twitter</label>
                        <input type="text" class="form-control form-control-sm" id="twitter" wire:model="twitter">
                        @error('twitter') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control form-control-sm" id="instagram" wire:model="instagram">
                        @error('instagram') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="text" class="form-control form-control-sm" id="linkedin" wire:model="linkedin">
                        @error('linkedin') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="youtube" class="form-label">YouTube</label>
                        <input type="text" class="form-control form-control-sm" id="youtube" wire:model="youtube">
                        @error('youtube') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">{{ $editingAuthorId ? 'Update' : 'Create' }} Author</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Profession</th>
                    <th>Image</th>
                    <th>Bio</th>
                    <th>Social Media</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->profession }}</td>
                        <td>
                            @if($author->image)
                                <img src="{{ asset($author->image) }}" alt="{{ $author->name }}" width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ Str::limit($author->bio, 150) }}</td>
                        <td>
                            @if($author->facebook)
                                <a href="{{ $author->facebook }}" target="_blank" class="btn btn-sm btn-primary"><i class="fab fa-facebook"></i></a>
                            @endif
                            @if($author->twitter)
                                <a href="{{ $author->twitter }}" target="_blank" class="btn btn-sm btn-primary"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if($author->instagram)
                                <a href="{{ $author->instagram }}" target="_blank" class="btn btn-sm btn-primary"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if($author->linkedin)
                                <a href="{{ $author->linkedin }}" target="_blank" class="btn btn-sm btn-primary"><i class="fab fa-linkedin"></i></a>
                            @endif
                            @if($author->youtube)
                                <a href="{{ $author->youtube }}" target="_blank" class="btn btn-sm btn-primary"><i class="fab fa-youtube"></i></a>
                            @endif
                        </td>
                        <td>
                            <button wire:click="edit({{ $author->id }})" class="btn btn-sm btn-primary"><i class="fa fa-edit pr-0"></i></button>
                            <button wire:confirm="Are you sure you want to delete this author?" wire:click="delete({{ $author->id }})" class="btn btn-sm btn-danger"><i class="fa fa-trash pr-0"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{ $authors->links() }}

</div>