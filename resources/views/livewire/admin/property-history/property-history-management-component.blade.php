<div>
    <h4 class="mb-4 text-start text-primary">Token Receipt Listing</h4>

    <div class="mb-3 d-flex justify-content-end mt-5">
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="Search Token ID..." wire:model="search">
            <button class="btn btn-primary ml-2" wire:click="searchRecords">Search</button>
        </div>

        {{-- <a href="{{ route('admin.token-receipt.token') }}" class="btn btn-success">
            + Add New Token Receipt
        </a> --}}
    </div>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 text-center">Property History</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="bg-secondary text-dark fw-bold">
                        <tr>
                            <th>Token ID</th>
                            <th>Seller</th>
                            <th>Buyer</th>
                            <th>Agent</th>
                            <th>Property</th>
                            <th>Commission</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($propertyHistory as $receipt)
                            <tr>
                                <td>{{ $receipt->token_id }}</td>
                                <td>{{ $receipt->seller ? $receipt->seller->seller_name : 'N/A' }}</td>
                                <td>{{ $receipt->buyer ? $receipt->buyer->buyer_name : 'N/A' }}</td>
                                <td>{{ $receipt->agent ? $receipt->agent->name : 'N/A' }}</td>
                                <td>{{ $receipt->property ? $receipt->property->title : 'N/A' }}</td>
                                <td>{{ $receipt->agent_comission }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $propertyHistory->links() }} <!-- Pagination -->
    </div>
</div>
