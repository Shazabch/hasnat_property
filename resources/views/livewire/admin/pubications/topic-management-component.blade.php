<div class="container">
    <h2 class="mb-4">Topic Management</h2>

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Add/Edit Topic Form -->
    <div class="card mb-1">
        <div class="card-header">
            <h3 class="mb-0">{{ $editingTopicId ? 'Edit Topic' : 'Add New Topic' }}</h3>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="{{ $editingTopicId ? 'update' : 'create' }}">
                <div class="form-group">
                    <label for="name">Topic Name</label>
                    <input type="text" id="name" wire:model="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ $editingTopicId ? 'Update Topic' : 'Add Topic' }}
                </button>
                @if($editingTopicId)
                    <button type="button" wire:click="$set('editingTopicId', null)" class="btn btn-secondary ml-2">
                        Cancel
                    </button>
                @endif
            </form>
        </div>
    </div>

    <!-- Topic List -->
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="mb-0">Existing Topics</h3>
        </div>
        <ul class="list-group list-group-flush">
            @foreach($topics as $topic)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $topic->name }} ({{ $topic->publications_count }})
                    <div>
                        <button wire:click="edit({{ $topic->id }})" class="btn btn-sm btn-primary mr-2">Edit</button>
                        <button wire:confirm="Are you sure you want to delete this topic?" wire:click="delete({{ $topic->id }})" class="btn btn-sm btn-danger">Delete</button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-4">
        {{ $topics->links() }}
    </div>
</div>