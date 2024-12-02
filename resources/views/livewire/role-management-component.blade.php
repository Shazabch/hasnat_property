<div class="card card-custom gutter-b example example-compact">
    <div class="card-body pt-3">
        <x-full-page-loader wire:loading.delay />
        <div>
            @if($editableMode)
                <form wire:submit="save">
                    <h2 class="text-capitalize">role Details</h2>
                    <div class="row gutters-0 mt-3">
                        <div class="form-group col-md-12">
                            <label>Name</label>
                            <input wire:model="role.name" type="text" class="form-control @error('role.name') is-invalid @enderror">
                            @error('role.name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-md-12 my-5">
                            <h4>Permissions</h4>
                            @if($role->name =='SuperAdmin')
                            <div class="bg-danger my-3 px-3 rounded text-danger text-white">
                                Note: <b class="bg-white px-2 rounded text-danger">SuperAdmin</b> Role have all the permissions in the system.
                            </div>
                            @else
                            <div class="checkbox-inline">
                                @foreach($allPermissions as $permission)
                                    <label class="checkbox checkbox-success">
                                        <input type="checkbox" wire:model="selectedPermissions" value="{{ $permission->name }}" name="check-p-{{ $permission->id }}"/>
                                        <span></span>
                                        {{ $permission->name }}
                                    </label>
                                    @endforeach
                            </div>
                            @endif
                            
                        </div>


                        <div class="form-group col-md-12 mt-2">
                            <button type="submit" class="btn btn-primary font-weight-bolder btn-sm">Save</button>
                            <button wire:click.prevent="cancelEdit" class="btn btn-secondary font-weight-bolder btn-sm">Cancel</button>
                        </div>

                    </div>
                </form> 
            @else
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="text-capitalize">roles</h2>
                    @can('role-management')
                    <a href="" wire:click.prevent="createOrEdit" class="btn btn-primary font-weight-bolder btn-sm my-2 text-capitalize">Add New role</a>
                    @endcan
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Time</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->created_at->format('d-M-Y h:i a') }}</td>
                                <td>
                                    @if($role->name != 'SuperAdmin')
                                        @can('role-management')
                                        <button wire:click.prevent="createOrEdit({{ $role->id }})" class="btn btn-sm btn-info">Edit</button>
                                        @endcan
                                        @can('role-management')
                                        <button wire:confirm="Are you sure?" wire:click.prevent="delete({{ $role->id }})" class="btn btn-sm btn-danger">Delete</button>
                                        @endcan
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="100">
                                    <div class="alert alert-secondary text-center">No roles Data Found</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $roles->links() }}
                </div>
            @endif
        </div>


    </div>
</div>