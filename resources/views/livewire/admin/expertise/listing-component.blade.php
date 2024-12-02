<div>
    <div class="bg-info-o-40 p-2 rounded text-center text-white text-info mb-1">
        <h3 class="mb-0">Expertises</h3>
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
                            <th>Show on Homepage</th>
                            <th>Created At</th>
                        </thead>
                        <tbody wire:sortable="updateOrder">
                            @forelse($expertises as $expertise)
                                <tr wire:sortable.item="{{ $expertise->id }}" wire:key="exp{{ $expertise->id }}">
                                    <td>
                                        <span wire:sortable.handle>
                                            @if ($enableReorder)
                                            <span class="btn btn-light btn-sm" >
                                                <i class="fas fa-arrows-alt"></i>
                                                </span>
                                            @endif
                                        </span>
                                        <a href="{{ route('admin.expertise.edit', $expertise->id) }}"
                                            class="btn btn-sm btn-info"><i class="fa fa-edit pr-0"></i></a>
                                        <a :key="{{ $expertise->id }}" type="button"
                                            wire:confirm="Are you sure?" wire:click="delete('{{ $expertise->id }}')"
                                            class="btn btn-sm btn-danger"><i class="fa fa-trash pr-0"></i></a>
                                        <a target="_blank" href="{{ route('admin.expertise.preview', $expertise->id) }}" title="Preview" class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i></a>
                                        <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#schemaModal" wire:click="$dispatchTo('admin.schemas.create-edit-component', 'loadSchema', {schemaable_type: 'App\\Models\\Expertise', schemaable_id:{{ $expertise->id }} })">Schema</button>
                                    </td>
                                    <td>{{ $expertise->id }}</td>
                                    <td>
                                        @if ($expertise->image)
                                            <a href="{{ asset($expertise->image) }}" target="_blank">
                                                <i class="fa fa-eye text-info"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{ $expertise->title }}</td>
                                    <td>{{ $expertise->slug }}</td>
                                    <td>
                                        @if ($expertise->status == 1)
                                            <span class="badge bg-success text-white">Published</span>
                                        @else
                                            <span class="badge bg-light">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="checkbox-inline">
                                            <!-- emit event on change -->
                                            <label class="checkbox checkbox-success">
                                                <input type="checkbox" {{ $expertise->show_on_dashboard ? 'checked' : '' }} wire:change="showOnDashboard('{{ $expertise->id }}', $event.target.checked)" name="check-p-{{ $expertise->id }}" />
                                                <span></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>{{ $expertise->created_at->format('d-M-Y h:i a') }}</td>
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
                        {{ $expertises->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>