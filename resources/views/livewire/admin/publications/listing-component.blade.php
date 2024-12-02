<div>
    <div class="bg-info-o-40 p-2 rounded text-center text-white text-info mb-1">
        <h3 class="mb-0">Publications</h3>
    </div>
    <div class="card">
        <x-full-page-loader wire:loading.delay />
        <div class="card-body pt-3">

            <div>
                <div class="d-flex justify-content-between mb-1 align-items-center">
                    <input type="text" wire:model.live.debounce="search" class="form-control"
                        placeholder="Search">
                    <div class="col-3">
                        <select wire:model.live="status" class="form-control">
                            <option value="">All</option>
                            <option value="1">Published</option>
                            <option value="0">Draft</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <th></th>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Meta Title</th>
                            <th>Created At</th>
                        </thead>
                        <tbody>

                            @forelse($publications as $publication)
                                <tr wire:key="pub{{ $publication->id }}">
                                    <td>
                                        <a href="{{ route('admin.publications.edit', $publication->id) }}"
                                            class="btn btn-sm btn-info"><i class="fa fa-edit pr-0"></i></a>
                                        <a :key="{{ $publication->id }}" type="button"
                                            wire:confirm="Are you sure?" wire:click="delete('{{ $publication->id }}')"
                                            class="btn btn-sm btn-danger"><i class="fa fa-trash pr-0"></i></a>
                                        <a target="_blank" href="{{ route('admin.publications.preview', $publication->id) }}" title="Preview" class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i></a>
                                        <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#schemaModal" wire:click="$dispatchTo('admin.schemas.create-edit-component', 'loadSchema', {schemaable_type: 'App\\Models\\Publication', schemaable_id:{{ $publication->id }} })">Schema</button>
                                    </td>
                                    <td>{{ $publication->id }}</td>
                                    <td>
                                        @if ($publication->image)
                                            <a href="{{ asset($publication->image) }}" target="_blank">
                                                <i class="fa fa-eye text-info"></i>
                                            </a>
                                        @endif
                                    </td>
                                    </td>
                                    <td>{{ $publication->title }}</td>
                                    <td>{{ $publication->slug }}</td>
                                    <td>@if ($publication->status == 1)
                                            <span class="badge bg-success text-white">Published</span>
                                        @else
                                            <span class="badge bg-light">Draft</span>
                                        @endif
                                    </td>
                                    <td>{{ $publication->meta_title }}</td>
                                    <td>{{ $publication->created_at->format('d-M-Y h:i a') }}</td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100">
                                        <div class="alert alert-secondary text-center">No Data Found</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $publications->links() }}
                </div>
            </div>
        </div>

    </div>
</div>
