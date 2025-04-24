<div>
    <!-- Search Bar -->
    <div class="container mt-4">
        <!-- Page Header -->
        <div class="card shadow-lg rounded mb-4">
            <div class="card-header  text-dark d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Home Page Sections</h4>
                {{-- <input type="text" placeholder="Search sections" class="form-control w-50" wire:model.debounce.400ms="search"> --}}
                <button class="btn btn-light border border-primary" data-toggle="modal" data-target="#homePageModal" wire:click="editItem">
                    <i class="fas fa-edit"></i> Edit
                </button>
            </div>
        </div>

<!-- Sections in Vertical Order -->
            <div class="row">
                <!-- Section A Card -->
                <div class="col-12">
                    <div class="card p-3 shadow-lg rounded mb-4">
                        <div class="card-header bg-white text-dark text-center">
                            <h5 class="mb-0">📌 Section A</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Title 1</th>
                                        <th>Section Title 1</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($homePages as $section)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $section->title1 }}</td>
                                            <td>{{ $section->sec_title1 }}</td>
                                            <td>{{ $section->content1 }}</td>
                                            <td>
                                                @if ($section->image1)
                                                    <a href="{{ asset('storage/' . $section->image1) }}" target="_blank">
                                                        <img src="{{ asset('storage/' . $section->image1) }}"
                                                            alt="Section A Image"
                                                            class="img-thumbnail"
                                                            style="width: 50px; height: 50px;">
                                                    </a>
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer text-muted text-center">
                            Showing Section A
                        </div>
                    </div>
                </div>

                <!-- Section B Card -->
                <div class="col-12">
                    <div class="card p-3 shadow-lg rounded">
                        <div class="card-header bg-white text-dark text-center">
                            <h5 class="mb-0">📌 Section B</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Main Title</th>
                                        <th>Sub Title</th>
                                        <th>Third Title</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($homePages as $section)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $section->main_title2 }}</td>
                                            <td>{{ $section->sub_title2 }}</td>
                                            <td>{{ $section->third_title2 }}</td>
                                            <td>
                                                @if ($section->image2)
                                                    <a href="{{ asset('storage/' . $section->image2) }}" target="_blank">
                                                        <img src="{{ asset('storage/' . $section->image2) }}"
                                                            alt="Section B Image"
                                                            class="img-thumbnail"
                                                            style="width: 50px; height: 50px;">
                                                    </a>
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer text-muted text-center">
                            Showing Section B
                        </div>
                    </div>
                </div>
            </div>
            
    </div>
    <!-- Modal -->
    <div class="modal fade" id="homePageModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Edit Sections</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form wire:submit.prevent="saveEntry">
                    <div class="modal-body">
                        <div class="row">
                            <!-- Section A -->
                            <div class="col-md-6">
                                <div class="card p-4 shadow rounded">
                                    <h5 class="text-center">📌 Section A</h5>

                                    <label class="mt-3"><b>Title 1</b>:</label>
                                    <input type="text" class="form-control" wire:model="title1">
                                    @error('title1') <small class="text-danger">{{ $message }}</small> @enderror

                                    <label class="mt-3"><b>Section Title 1</b>:</label>
                                    <input type="text" class="form-control" wire:model="sec_title1">
                                    @error('sec_title1') <small class="text-danger">{{ $message }}</small> @enderror

                                    <label class="mt-3"><b>Content 1</b>:</label>
                                    <textarea class="form-control" wire:model="content1"></textarea>

                                    <!-- Section A Image Upload -->
                                    <div class="mt-4">
                                        <label><b>Add Image 1</b>:</label>
                                        <div>
                                            @if ($section->image1)
                                                <a href="{{ asset('storage/' . $section->image1) }}" target="_blank">
                                                    <img src="{{ asset('storage/' . $section->image1) }}"
                                                        alt="Section A Image"
                                                        class="img-thumbnail"
                                                        style="width: 100px; height: 100px; object-fit: cover; border-radius: 4px;">
                                                </a>
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </div>

                                        <div class="form-group mt-3">
                                            <x-filepond-input wire:model="image_1_name" allowImagePreview
                                                imagePreviewMaxHeight="200" allowFileTypeValidation
                                                acceptedFileTypes="['image/jpeg', 'image/png','image/jpg']"
                                                allowFileSizeValidation maxFileSize="20mb" id="Image_1" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Section B -->
                            <div class="col-md-6">
                                <div class="card p-4 shadow rounded">
                                    <h5 class="text-center">📌 Section B</h5>

                                    <label class="mt-3"><b>Main Title</b>:</label>
                                    <input type="text" class="form-control" wire:model="main_title2">

                                    <label class="mt-3"><b>Sub Title</b>:</label>
                                    <input type="text" class="form-control" wire:model="sub_title2">

                                    <label class="mt-3"><b>Third Title</b>:</label>
                                    <input type="text" class="form-control" wire:model="third_title2">

                                    <label class="mt-3"><b>Content 2</b>:</label>
                                    <textarea class="form-control" wire:model="content2"></textarea>

                                    <!-- Section B Image Upload -->
                                    <div class="mt-4">
                                        <label><b>Add Image 2</b>:</label>
                                        <div>
                                            @if ($section->image2)
                                                <a href="{{ asset('storage/' . $section->image2) }}" target="_blank">
                                                    <img src="{{ asset('storage/' . $section->image2) }}"
                                                        alt="Section B Image"
                                                        class="img-thumbnail"
                                                        style="width: 100px; height: 100px; object-fit: cover; border-radius: 4px;">
                                                </a>
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </div>

                                        <div class="form-group mt-3">
                                            <x-filepond-input wire:model="image_2_name" allowImagePreview
                                                imagePreviewMaxHeight="200" allowFileTypeValidation
                                                acceptedFileTypes="['image/jpeg', 'image/png','image/jpg']"
                                                allowFileSizeValidation maxFileSize="20mb" id="Image_2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="properties_sold">Properties Sold</label>
                                <input type="text" class="form-control" wire:model="properties_sold"> 
                            </div>
                            <div class="col-md-6">
                                <label for="happy_clients">Happy Clients</label>
                                <input type="text" class="form-control" wire:model="happy_clients">
                            </div>
                            <div class="col-md-6">
                                <label for="years_exp">Years Of Experience</label>
                                <input type="text" class="form-control" wire:model="years_exp">
                            </div>
                            <div class="col-md-6">
                                <label for="rented_properties">Rented Properties</label>
                                <input type="text" class="form-control" wire:model="rented_properties"> 
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer mt-4">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">
                                {{ $homePageId ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('success-box', message => {
                Swal.fire({
                    title: 'Success',
                    text: message,
                    icon: 'success',
                    confirmButtonText: 'Okay'
                });
            });
        });
    </script>
</div>



