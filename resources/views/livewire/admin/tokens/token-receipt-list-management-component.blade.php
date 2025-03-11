<div>
    <h4 class="mb-4 text-center text-primary">Token Receipt Listing</h4>

    <div class="mb-3 d-flex justify-content-between">
        <div class="input-group w-50">
            <input type="text" class="form-control mt-5" placeholder="Search Token ID..." wire:model="search">
            <button class="btn btn-primary ml-3 mt-5" wire:click="searchRecords">Search</button>
        </div>

        <a href="{{ route('admin.token-receipt.token') }}" class="btn btn-success mt-5">
            + Add New Token Receipt
        </a>
    </div>

    <div class="row">
        @foreach($tokenReceipts as $receipt)
            <div class="col-md-4 mb-5 mt-5">
                <div class="card shadow-sm border-primary">
                    <div class="card-header bg-primary text-white text-center">
                        <h5>Token ID: {{ $receipt->token_id }}</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Amount:</strong> {{ number_format($receipt->token_amount, 2) }}</p>
                        <p><strong>Seller:</strong> {{ $receipt->seller ? $receipt->seller->seller_name : 'N/A' }}</p>
                        <p><strong>Buyer:</strong> {{ $receipt->buyer ? $receipt->buyer->buyer_name : 'N/A' }}</p>
                        <p><strong>Agent:</strong> {{ $receipt->agent ? $receipt->agent->name : 'N/A' }}</p>
                        <p><strong>Property:</strong> {{ $receipt->property ? $receipt->property->title : 'N/A' }}</p>
                        <p><strong>Start Date:</strong> {{ $receipt->start_date }}</p>
                        <p><strong>End Date:</strong> {{ $receipt->end_date }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $tokenReceipts->links() }} <!-- Pagination -->
    </div>
</div>
