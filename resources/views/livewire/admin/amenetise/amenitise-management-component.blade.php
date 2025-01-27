<!-- resources/views/livewire/admin/amentise-management-component.blade.php -->

<div>
    <!-- Search Bar for Amentise -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4>All Amentises</h4>
                <div class="col-md-6">
                    <label for="">Generic Search <small class="text-danger">*</small></label>
                    <input type="text" placeholder="Search amentises" class="form-control" wire:model.debounce.400ms="search">
                </div>
                <div>
                    <div class="btn btn-primary" data-toggle="modal" data-target="#amentiseModal" wire:click="addNew">
                        Add New Amentise
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
                    @foreach ($amentises as $amentise)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $amentise->name }}</td>
                            <td><i class="{{ $amentise->icon }} text-primary fa-lg"></i></td>
                            <td>{{ $amentise->is_active ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <i class="fas fa-edit text-primary cursor-pointer" data-toggle="modal" data-target="#amentiseModal" wire:click="editItem({{ $amentise->id }})"></i>
                                <i class="fas fa-trash text-danger cursor-pointer" wire:click="deleteAmentise({{ $amentise->id }})"></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $amentises->links() }}
            </div>
        </div>
    </div>

    <!-- Modal for Adding/Editing Amentise -->
    <div class="modal fade" id="amentiseModal" tabindex="-1" role="dialog" aria-labelledby="amentiseModalTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">{{ $amentise_id ? 'Edit' : 'Add' }} Amentise</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form wire:submit.prevent="addEntry">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" wire:model="name">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-12 mt-2">
                                <label for="icon">Icon</label>
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="iconDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="{{ $icon ?: 'fas fa-arrow-down' }}"></i> Select Icon
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="iconDropdown">
                                        @foreach ($icons as $iconClass => $iconName)
                                            <a class="dropdown-item" wire:click="$set('icon', '{{ $iconClass }}')">
                                                <i class="{{ $iconClass }}"></i> {{ $iconName }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                @error('icon') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-12 mt-2">
                                <label for="is_active">Is Active</label>
                                <select class="form-control" wire:model="is_active">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('is_active') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">{{ $amentise_id ? 'Update' : 'Save' }} Amentise</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
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

</script>
