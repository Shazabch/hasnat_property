<div>

    <div>
        <p>
            <a wire:ignore.self class="btn btn-info btn-block" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Quick Facts
                <i class="fas fa-chevron-down"></i>
            </a>
          </p>
          <div class="row">
            <div class="col">
              <div class="bg-info-o-25 collapse multi-collapse px-3 py-2 rounded mb-1 border border-info" id="multiCollapseExample1" wire:ignore.self>
                <div class="">
                    
                    <div class="d-flex justify-content-between mb-2">
                        <h3>Quick Facts</h3>
                        <button class="btn btn-info btn-sm" wire:click="add">Add Quick Fact</button>
                    </div>
                   <div wire:sortable="updateOrder">
                    @forelse ($quickfacts as $quickfact)
                        <div class="mb-1" id="qf-div-{{ $quickfact->id }}" wire:sortable.item="{{ $quickfact->id }}" wire:key="qf{{ $quickfact->id }}">
                            @livewire('admin.quick-facts.create-edit-component', ['quickfact' => $quickfact], key('qf_com' . $quickfact->id))
                        </div>
                        @empty
                            <div class="alert alert-light">No Quick Facts Found</div>
                        @endforelse
                    </div>

                </div>
              </div>
            </div>
          </div>
    </div>
</div>