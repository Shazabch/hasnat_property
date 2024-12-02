<div>
    <div class="bg-info-o-40 p-2 rounded text-center text-white text-info mb-1">
        <h3 class="mb-0">Conditions</h3>
    </div>
    <div class="card">
        <x-full-page-loader wire:loading.delay />
        <div class="card-body pt-3">

            <div>
                <div class="d-flex justify-content-between mb-1 align-items-center">
                    <div class="col-2">
                        <button wire:click="toggleReorder" class="btn btn-primary btn-sm">{{ $enableReorder ? 'Back' : 'Reorder' }}</button>
                    </div>
                    
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
                        <tbody wire:sortable="updateOrder">

                            @forelse($conditions as $condition)
                                <tr :key="{{ $condition->id }}" wire:sortable.item="{{ $condition->id }}" wire:key="con{{ $condition->id }}">
                                    <td>
                                        <span wire:sortable.handle>
                                            @if ($enableReorder)
                                            <span class="btn btn-light btn-sm">
                                                <i class="fas fa-arrows-alt"></i>
                                                </span>
                                            @endif
                                        </span>
                                        
                                        <a href="{{ route('admin.conditions.edit', $condition->id) }}"
                                            class="btn btn-sm btn-info"><i class="fa fa-edit pr-0"></i></a>
                                        <a :key="{{ $condition->id }}" type="button"
                                            wire:confirm="Are you sure?" wire:click="delete('{{ $condition->id }}')"
                                            class="btn btn-sm btn-danger"><i class="fa fa-trash pr-0"></i></a>
                                        <a target="_blank" href="{{ route('admin.conditions.preview', $condition->id) }}" title="Preview" class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i></a>
                                        <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#schemaModal" wire:click="$dispatchTo('admin.schemas.create-edit-component', 'loadSchema', {schemaable_type: 'App\\Models\\Condition', schemaable_id:{{ $condition->id }} })">Schema</button>
                                    </td>
                                    <td>{{ $condition->id }}</td>
                                    <td>
                                        @if ($condition->image)
                                            <a href="{{ asset($condition->image) }}" target="_blank">
                                                <i class="fa fa-eye text-info"></i>
                                            </a>
                                        @endif
                                    </td>
                                    </td>
                                    <td>{{ $condition->title }}</td>
                                    <td>{{ $condition->slug }}</td>
                                    <td>@if ($condition->status == 1)
                                            <span class="badge bg-success text-white">Published</span>
                                        @else
                                            <span class="badge bg-light">Draft</span>
                                        @endif
                                    </td>
                                    <td>{{ $condition->meta_title }}</td>
                                    <td>{{ $condition->created_at->format('d-M-Y h:i a') }}</td>

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
                    @if (!$enableReorder)
                        {{ $conditions->links() }}
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
