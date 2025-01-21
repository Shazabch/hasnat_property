<div>
    <!-- Header -->
    <div class="bg-info p-3 rounded text-center text-white mb-3">
        <h3 class="mb-0">Properties</h3>
    </div>

    <!-- Card Wrapper -->
    <div class="card">
        <!-- Loader -->
        <x-full-page-loader wire:loading.delay />

        <div class="card-body pt-3">
            <div>
                <!-- Controls: Reorder, Search, and Filter -->
                <div class="d-flex justify-content-between mb-3 align-items-center">
                    <!-- Reorder Button -->
                    <div class="col-auto">
                        <button wire:click="toggleReorder" class="btn btn-primary btn-sm">
                            {{ $enableReorder ? 'Back' : 'Reorder' }}
                        </button>
                    </div>

                    <!-- Search Input -->
                    <div class="col">
                        <input type="text" wire:model.live.debounce="search" class="form-control" placeholder="Search properties...">
                    </div>

                    <!-- Status Filter -->
                    <div class="col-auto">
                        <select wire:model.live="status" class="form-control">
                            <option value="">All</option>
                            <option value="1">Published</option>
                            <option value="0">Draft</option>
                        </select>
                    </div>
                </div>

                <!-- Properties Table -->
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th>Action(s)</th>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Area</th>
                                <th>Slug</th>
                                <th>Property Type</th>
                                <th>Description</th>
                                <th>Categories</th>
                                <th>Featured</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody wire:sortable="updateOrder">
                            @forelse($properties as $property)
                                <tr wire:sortable.item="{{ $property->id }}" wire:key="prop{{ $property->id }}">
                                    <td>
                                        <!-- Reorder Button -->
                                        <span wire:sortable.handle>
                                            @if ($enableReorder)
                                                <span class="btn btn-light btn-sm">
                                                    <i class="fas fa-arrows-alt"></i>
                                                </span>
                                            @endif
                                        </span>
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.properties.edit', $property->id) }}" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit pr-0"></i>
                                        </a>
                                        <!-- Delete Button -->
                                        <a wire:click.prevent="delete('{{ $property->id }}')" class="btn btn-sm btn-danger" wire:confirm="Are you sure?">
                                            <i class="fa fa-trash pr-0"></i>
                                        </a>
                                    </td>
                                    <td>{{ $property->id }}</td>
                                    <td>
                                        @if ($property->main_image)
                                            <a href="{{ asset($property->main_image) }}" target="_blank">
                                                <img src="{{ asset($property->main_image) }}" alt="Property Image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                            </a>
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>

                                    <td>{{ $property->title }}</td>
                                    <td>{{ $property->price }}</td>
                                    <td>{{ $property->adress }}</td>
                                    <td>
                                        @if ($property->status == 1)
                                            <span class="badge bg-success text-white">Published</span>
                                        @else
                                            <span class="badge bg-light">Draft</span>
                                        @endif
                                    </td>
                                    <td>{{ $property->area }}</td>
                                    <td>{{ $property->slug }}</td>
                                    <td>{{ $property->property_type }}</td>
                                    <td>{{ $property->description }}</td>
                                    <td>{{ $property->categories }}</td>
                                    <td>
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-success">
                                                <input type="checkbox" {{ $property->featured ? 'checked' : '' }} wire:change="toggleFeatured('{{ $property->id }}', $event.target.checked)" />
                                                <span></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>{{ $property->created_at->format('d-M-Y h:i a') }}</td>
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

                <!-- Pagination -->
                <div>
                    @if (!$enableReorder)
                        {{ $properties->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
