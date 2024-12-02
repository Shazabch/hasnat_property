<div class="card">
    <div class="card-body">
        <h2 class="h2 mb-4">Manage Publication Types</h2>
    
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    
        <form wire:submit.prevent="save" class="mb-4">
            <div class="mb-3">
                <label for="name" class="form-label">Type Name:</label>
                <input type="text" id="name" wire:model="name" class="form-control @error('name') is-invalid @enderror">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary">
                {{ $editing ? 'Update' : 'Create' }} Type
            </button>
            @if($editing)
                <button type="button" wire:click="cancel" class="btn btn-secondary ms-2">
                    Cancel
                </button>
            @endif
        </form>
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($types as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td>
                            <button wire:click="edit({{ $type->id }})" class="btn btn-warning btn-sm">
                                Edit
                            </button>
                            <button wire:click="delete({{ $type->id }})" class="btn btn-danger btn-sm ms-2" onclick="return confirm('Are you sure you want to delete this type?')">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        <div class="mt-4">
            {{ $types->links() }}
        </div>
    </div>
</div>