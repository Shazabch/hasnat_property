<div>
    <!-- Search Bar for Specifications -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4>All Specifications</h4>
                <div class="col-md-6">
                    <label for="">Generic Search <small class="text-danger">*</small></label>
                    <input type="text" placeholder="Search specifications" class="form-control"
                        wire:model.debounce.400ms="search">
                </div>
                <div>
                    <div class="btn btn-primary" data-toggle="modal" data-target="#specificationComponentModal"
                        wire:click="addNew">
                        Add New Specification
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Is Active</th>
                        <th>Action(s)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($specifications as $specification)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $specification->name }}</td>
                            <td>{{ $specification->icon }}</td>
                            <td>{{ $specification->is_active ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <i class="fas fa-edit text-primary cursor-pointer" data-toggle="modal"
                                    data-target="#specificationComponentModal"
                                    wire:click="editItem({{ $specification->id }})"></i>
                                <!-- Delete button triggering the deleteSpecification method directly -->
                                <i class="fas fa-trash text-danger cursor-pointer" wire:click="deleteSpecification({{ $specification->id }})"></i>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $specifications->links() }}
            </div>
        </div>
    </div>

    <!-- Success Notification Box -->
    <div id="successBox" class="alert alert-success alert-dismissible fade show" style="display: none;">
        <strong>Success!</strong> <span id="successMessage"></span>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>

    <!-- Modal for Adding/Editing Specification -->
    <div class="modal fade" id="specificationComponentModal" tabindex="-1" role="dialog"
        aria-labelledby="specificationComponentModalTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">{{ $specification_id ? 'Edit' : 'Add' }} Specification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form wire:submit.prevent="addEntry">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="specification.name">Name</label>
                                <input type="text" class="form-control" wire:model="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-2">
                                <label for="specification.icon">Icon</label>
                                <input type="text" class="form-control" wire:model="icon">
                                @error('icon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-2">
                                <label for="specification.is_active">Is Active</label>
                                <select class="form-control" wire:model="is_active">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('is_active')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">{{ $specification_id ? 'Update' : 'Save' }}
                            Specification
                            <span wire:loading wire:click="addEntry" class="spinner-border spinner-border-sm"></span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Listen for the success-box event
        Livewire.on('success-box', (event) => {
            const successBox = document.getElementById('successBox');
            const successMessage = document.getElementById('successMessage');

            // Show the success message in the box
            successMessage.innerText = event.message;

            // Display the success box
            successBox.style.display = 'block';

            // Auto-hide the success box after 3 seconds
            setTimeout(() => {
                successBox.style.display = 'none';
            }, 3000);
        });
        document.addEventListener('DOMContentLoaded', function () {
    Livewire.on('success-box', message => {
        Swal.fire({
            title: 'Success',
            text: message,
            icon: 'success',
            confirmButtonText: 'Okay'
        });
    });
});
    });
</script>
