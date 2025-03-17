<div>
    <!-- Search Bar -->
    <div class="container mt-4">
        <div class="card shadow-lg rounded mb-4">
            <div class="card-header text-dark d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Team Management</h4>
                <button class="btn btn-light border border-primary" data-toggle="modal" data-target="#teamModal"
                    wire:click="addNew">
                    <i class="fas fa-plus"></i> Add New Team Member
                </button>
            </div>
        </div>

        <!-- Team Members Table -->
        <div class="row">
            <div class="col-12">
                <div class="card p-3 shadow-lg rounded mb-4">
                    <div class="card-header bg-white text-dark text-center">
                        <h5 class="mb-0">Team Members</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $team->name }}</td>
                                        <td>{{ $team->designation }}</td>
                                        <td>
                                            @if ($team->image)
                                                <a href="{{ asset('/' . $team->image) }}" target="_blank">
                                                    <img src="{{ asset('/' . $team->image) }}" alt="{{ $team->name }}"
                                                        class="img-thumbnail" style="width: 50px; height: 50px;">
                                                </a>
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <i class="fas fa-edit text-primary cursor-pointer" wire:click="editItem({{ $team->id }})" data-toggle="modal" data-target="#teamModal"></i>

                                            <i class="fas fa-trash text-danger cursor-pointer ml-1" wire:click="deleteTeam({{ $team->id }})"></i>

                                            <a href="{{ route('admin.agent-history', ['id' => $team->id]) }}">
                                                <i class="fas fa-eye text-info cursor-pointer ml-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer  text-center">
                        {{ $teams->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="teamModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">{{ $team->id ? 'Edit' : 'Add' }} Team Member</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form wire:submit.prevent="addEntry">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label><b>Name</b>:</label>
                                <input type="text" class="form-control" wire:model="team.name">
                                @error('team.name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label><b>Designation</b>:</label>
                                <input type="text" class="form-control" wire:model="team.designation">
                                @error('team.designation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 mt-4">
                                <label><b>Image</b>:</label>
                                <div class="form-group mt-3">
                                    <!-- FilePond Input for Image Upload -->
                                    <x-filepond-input wire:model="image" allowImagePreview imagePreviewMaxHeight="200"
                                        allowFileTypeValidation
                                        acceptedFileTypes="['image/jpeg', 'image/png', 'image/jpg']"
                                        allowFileSizeValidation maxFileSize="20mb" id="Image_1" />
                                </div>
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer mt-4">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            {{ $team->id ? 'Update' : 'Save' }}
                        </button>
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
