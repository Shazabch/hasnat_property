<div class="">
    <div class="d-flex justify-content-between mb-2 mt-1">
        <h3>Content Sections</h3>
        <button wire:click="addNewContentSection" wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed" class="btn btn-primary btn-sm">Add New Content Section</button>
    </div>
    <div wire:sortable="updateOrder">
        @forelse ($contentSections as $contentSection)
        <div id="content-section-div-{{ $contentSection->id }}" wire:sortable.item="{{ $contentSection->id }}" wire:key="sec{{ $contentSection->id }}">
            @livewire('admin.content-section.create-edit-component', ['contentSection' => $contentSection, 'showInCard' => $showInCard], key('content-section-'.$contentSection->id))
        </div>
        @empty
            <div class="alert alert-light text-center">No content sections found</div>
        @endforelse
    </div>
</div>
