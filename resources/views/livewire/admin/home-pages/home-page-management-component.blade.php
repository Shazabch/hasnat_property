<div>
    <!-- Search Bar -->
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Home Page Sections</h4>
            <input type="text" placeholder="Search sections" class="form-control w-50"
                wire:model.debounce.400ms="search">
            <button class="btn btn-primary" data-toggle="modal" data-target="#homePageModal" wire:click="editItem">
                Edit
            </button>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="card p-4 shadow rounded">
                        <h5 class="text-center">Section 1</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title 1 (Section A)</th>
                                    <th>Section Title 1 (Section A)</th>
                                    <th>Main Title 2 (Section B)</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($homePages as $section)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $section->title1 }}</td>
                                        <td>{{ $section->sec_title1 }}</td>
                                        <td>{{ $section->main_title2 }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-4 shadow rounded">
                        <h5 class="text-center">Section 2</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title 1 (Section A)</th>
                                    <th>Section Title 1 (Section A)</th>
                                    <th>Main Title 2 (Section B)</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($homePages as $section)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $section->title1 }}</td>
                                        <td>{{ $section->sec_title1 }}</td>
                                        <td>{{ $section->main_title2 }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                            <div class="col">
                                <div class="card p-4 shadow rounded">
                                    <!-- Section A Fields -->
                                    <label>Title 1 (Section A)</label>
                                    <input type="text" class="form-control" wire:model="title1">
                                    @error('title1')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                    <label>Section Title 1 (Section A)</label>
                                    <input type="text" class="form-control" wire:model="sec_title1">
                                    @error('sec_title1')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                    <label>Content 1 (Section A)</label>
                                    <textarea class="form-control" wire:model="content1"></textarea>

                                    <label>Image 1 (Section A)</label>
                                    <input type="file" class="form-control-file" wire:model="image1">
                                    @if ($image1)
                                        <img src="/{{ $image1 }}" width="100">
                                    @endif
                                    @error('image1')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col">
                                <div class="card p-4 shadow rounded">
                                    <!-- Section B Fields -->
                                    <!-- Section B Fields -->
                                    <label>Main Title 2 (Section B)</label>
                                    <input type="text" class="form-control" wire:model="main_title2">

                                    <label>Sub Title 2 (Section B)</label>
                                    <input type="text" class="form-control" wire:model="sub_title2">

                                    <label>Third Title 2 (Section B)</label>
                                    <input type="text" class="form-control" wire:model="third_title2">

                                    <label>Content 2 (Section B)</label>
                                    <textarea class="form-control" wire:model="content2"></textarea>

                                    <label>Image 2 (Section B)</label>
                                    <input type="file" class="form-control-file" wire:model="image2">
                                    @if ($image2)
                                        <img src="/{{ $image2 }}" width="100">
                                    @endif

                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit"
                                class="btn btn-primary">{{ $homePageId ? 'Update' : 'Save' }}</button>
                        </div>
                </form>
            </div>
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
