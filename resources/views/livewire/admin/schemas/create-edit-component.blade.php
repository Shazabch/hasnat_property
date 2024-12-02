<div>
    <div class="card">
        <div class="card-body py-3 px-2">
            <div style="height: 20px" class="text-info">
                <div class="" wire:loading>
                    <small>Loading...</small>
                </div>
            </div>
            @if($schema)
                <div>
                    <form wire:submit.prevent="save">
                        {{-- <div class="d-flex justify-content-between">
                            <h4>Schema</h4>
                            <button type="button" wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed" class="btn btn-primary">Save Schema</button>
                        </div> --}}
                        <div class="form-group">
                            <label for="schema">Schema</label>
                            <textarea wire:model="schema.schema" rows="25" class="form-control @error('schema.schema') border border-danger @enderror"></textarea>
                            @error('schema.schema')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed">Save Schema</button>
                        <button type="button" class="btn btn-secondary" wire:click="$dispatch('close-schema-modal')">Close</button>
                    </form>
                </div>
            @else
                <div class="text-center py-5">
                    <button wire:click="create" class="btn btn-primary" wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed">Create Schema</button>
                    <button type="button" class="btn btn-secondary" wire:click="$dispatch('close-schema-modal')">Close </button>
                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>