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
            <!-- Controls: Reorder, Search, and Filter -->
            <div class="d-flex flex-wrap justify-content-between mb-3 align-items-center">
                <!-- Reorder Button -->
                {{-- <div class="mb-2 mb-md-0">
                    <button wire:click="toggleReorder" class="btn btn-primary btn-sm">
                        {{ $enableReorder ? 'Back' : 'Reorder' }}
                    </button>
                </div> --}}

                <!-- Search Input -->
                <div class="flex-grow-1 mx-md-3 mb-2 mb-md-0">
                    <input type="text" wire:model.live.debounce.500ms="search" class="form-control"
                        placeholder="Search properties...">
                </div>

                <!-- Status Filter -->
                <div class="mb-2 mb-md-0">
                    <select wire:model.live="status" class="form-control">
                        <option value="">All</option>
                        <option value="1">Published</option>
                        <option value="0">Draft</option>
                    </select>
                </div>
            </div>

            <!-- Properties Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>Actions</th>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Area</th>
                            <th>Slug</th>
                            <th>Property Type</th>
                            <th>Description</th>
                            <th>Categories</th>
                            <th>Featured</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody >
                        @forelse($properties as $property)
                            <tr wire:sortable.item="{{ $property->id }}" wire:key="prop{{ $property->id }}">
                                <td class="d-flex align-items-center">
                                    {{-- @if ($enableReorder)
                                        <span wire:sortable.handle class="btn btn-light btn-sm me-2">
                                            <i class="fas fa-arrows-alt"></i>
                                        </span>
                                    @endif --}}
                                    <a href="{{ route('admin.properties.edit', $property->id) }}"
                                        class="btn btn-sm btn-info me-2">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button wire:click.prevent="delete('{{ $property->id }}')"
                                        class="btn btn-sm btn-danger m-2">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                    <button wire:click="toggleStatus({{ $property->id }},{{ $property->status }})" class="btn btn-sm btn-@if ($property->status == 1) btn-primary @else btn-warning @endif mt-2">
                                        @if ($property->status == 1) Draft
                                        @else Publish @endif
                                    </button>

                                </td>
                                <td>{{ $property->id }}</td>
                                <td>
                                    @if ($property->main_image)
                                        <a href="{{ asset($property->main_image) }}" target="_blank">
                                            <img src="{{ asset($property->main_image) }}" alt="Property Image"
                                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                        </a>
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $property->title }}</td>
                                <td class="text-end">{{ number_format($property->price, 2) }}</td>
                                <td>{{ $property->address }}</td>
                               <td>
                                <div>
                                    <span class="badge {{ $property->status == 1 ? 'bg-success text-white' : 'bg-light' }}">
                                        {{ $property->status == 1 ? 'Published' : 'Draft' }}
                                    </span>


                                </div>
                                <td>
                                    <span class="badge {{ $property->type === 'sale' ? 'badge-success' : 'badge-primary' }}">
                                        {{ $property->type === 'sale' ? 'For Sale' : 'To Rent' }}
                                    </span>
                                </td>

                               </td>
                                <td>{{ $property->area }}</td>
                                <td>{{ $property->slug }}</td>
                                <td>{{ $property->property_type }}</td>
                                <td>{!! Str::limit($property->description, 30) !!}</td>
                                <td>{{ $property->categories }}</td>
                                <td>
                                    <label class="checkbox checkbox-success">
                                        <input type="checkbox" {{ $property->featured ? 'checked' : '' }}
                                            wire:change="toggleFeatured('{{ $property->id }}', $event.target.checked)">
                                        <span></span>
                                    </label>
                                </td>
                                <td>{{ $property->created_at->format('d-M-Y h:i a') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100" class="text-center">
                                    <div class="alert alert-secondary mb-0">No Data Found</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if (!$enableReorder)
                <div class="mt-3 d-flex justify-content-center">
                    {{ $properties->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
