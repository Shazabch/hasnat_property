<div>
    <!-- Header -->
    <div class="bg-info p-3 rounded text-center text-white mb-3">
        <h3 class="mb-0">Enquiries</h3>
    </div>

    <!-- Card Wrapper -->
    <div class="card">
        <x-full-page-loader wire:loading.delay />

        <div class="card-body pt-3">
            <!-- Controls: Search -->
            <div class="input-group mb-3">
                <input type="text" wire:model.live="search" class="form-control rounded-start m-2" placeholder="Search enquiries...">
                <button class="btn btn-primary m-2" type="button">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
            <!-- Enquiries Table -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse($enquiries as $index => $enquiry)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $enquiry->name }}</td>
                                <td>{{ $enquiry->email }}</td>
                                <td>{{ $enquiry->phone }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($enquiry->message, 50) }}</td>
                                <td>{{ $enquiry->created_at->format('d F Y, h:i A') }}</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <div class="alert alert-secondary mb-0">No Enquiries Found</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-3 d-flex justify-content-center">
                {{ $enquiries->links() }}
            </div>
        </div>
    </div>
</div>
