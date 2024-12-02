<div>
    <div class="bg-info-o-40 p-2 rounded text-center text-white text-info mb-1">
        <h3 class="mb-0">Web Pages</h3>
    </div>
    <div class="card">
        <x-full-page-loader wire:loading.delay />
        <div class="card-body pt-3">

            <div>
                <div class="d-flex justify-content-between mb-1 align-items-center">
                    <div class="col-2">
                        <!-- Add any additional buttons if needed -->
                    </div>
                    
                    <input type="text" wire:model.live.debounce="search" class="form-control"
                        placeholder="Search">

                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <th>Actions</th>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Meta Title</th>
                            <th>Slug</th>
                            
                            <th>Created At</th>
                        </thead>
                        <tbody>
                            @forelse($webPages as $webPage)
                                <tr wire:key="wp{{ $webPage->id }}">
                                    <td>
                                        <a href="{{ route('admin.web-pages.edit', $webPage->id) }}"
                                            class="btn btn-sm btn-info"><i class="fa fa-edit pr-0"></i></a>
                                        <button type="button"
                                            wire:confirm="Are you sure you want to delete this web page?"
                                            wire:click="delete('{{ $webPage->id }}')"
                                            class="btn btn-sm btn-danger"><i class="fa fa-trash pr-0"></i></button>
                                            <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#schemaModal" wire:click="$dispatchTo('admin.schemas.create-edit-component', 'loadSchema', {schemaable_type: 'App\\Models\\WebPage', schemaable_id:{{ $webPage->id }} })">Schema</button>
                                    </td>
                                    <td>{{ $webPage->id }}</td>
                                    <td>
                                        @if ($webPage->image)
                                            <a href="{{ asset($webPage->image) }}" target="_blank">
                                                <i class="fa fa-eye text-info"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{ $webPage->meta_title }}</td>
                                    <td>{{ $webPage->slug }}</td>
                                    
                                    <td>{{ $webPage->created_at->format('d-M-Y h:i a') }}</td>
                                    
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="alert alert-secondary text-center">No Data Found</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $webPages->links() }}
                </div>
            </div>
        </div>
    </div>
</div>