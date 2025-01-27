<div>
    <div class="bg-info-o-40 p-2 rounded text-center text-white text-info mb-1">
        <h3 class="mb-0">Projects</h3>
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
                            <th>Name</th>
                            <th>Description</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Created At</th>
                        </thead>
                        <tbody wire:sortable="updateOrder">

                            @forelse($projects as $item)
                                <tr :key="{{ $item->id }}" wire:sortable.item="{{ $item->id }}" wire:key="item{{ $item->id }}">
                                    <td>
                                        <span wire:sortable.handle>
                                            @if ($enableReorder)
                                            <span class="btn btn-light btn-sm">
                                                <i class="fas fa-arrows-alt"></i>
                                                </span>
                                            @endif
                                        </span>

                                        <a href="{{ route('admin.projects.edit', $item->id) }}"
                                            class="btn btn-sm btn-info"><i class="fa fa-edit pr-0"></i></a>
                                        <a :key="{{ $item->id }}" type="button"
                                            wire:confirm="Are you sure?" wire:click="delete('{{ $item->id }}')"
                                            class="btn btn-sm btn-danger"><i class="fa fa-trash pr-0"></i></a>

                                    </td>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        @if ($item->image)
                                            <a href="{{ asset($item->image) }}" target="_blank">
                                                <i class="fa fa-eye text-info"></i>
                                            </a>
                                        @endif
                                    </td>
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->rating }}</td>
                                    <td>@if ($item->status == 1)
                                            <span class="badge bg-success text-white">Published</span>
                                        @else
                                            <span class="badge bg-light">Draft</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at->format('d-M-Y h:i a') }}</td>

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
                        {{ $projects->links() }}
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
