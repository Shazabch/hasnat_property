<div>
    <div class="card">
        <div class="card-body p-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="btn btn-light btn-sm"  wire:sortable.handle>
                    <i class="fas fa-arrows-alt"></i>
                </span>
                <button class="btn btn-sm btn-danger" wire:confirm="Are you sure?" wire:click="$parent.delete('{{ $quickfact->id }}')">Delete</button>
            </div>
            <form wire:submit="save">
                <div class="form-group">
                    <label for="title">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm @error('quickfact.title') border border-danger @enderror" wire:model="quickfact.title">
                    @error('quickfact.title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description <span class="text-danger">*</span></label>
                    <textarea rows="4" class="form-control form-control-sm @error('quickfact.description') border border-danger @enderror" wire:model="quickfact.description"></textarea>
                    @error('quickfact.description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary">update</button>
            </form>
        </div>
    </div>
</div>