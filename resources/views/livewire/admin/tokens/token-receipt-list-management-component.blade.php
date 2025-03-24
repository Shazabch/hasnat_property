<div>
    <!-- Header -->
    <div class="bg-primary p-3 rounded text-center text-white mb-3">
        <h3 class="mb-0">Token Receipt Listing</h3>
    </div>

    <!-- Controls: Search + Add -->
    <div class="d-flex flex-wrap justify-content-between mb-3 align-items-center">
        <!-- Search -->
        <div class="flex-grow-1 mx-md-3 mb-2 mb-md-0">
            <input type="text" wire:model.live.debounce.500ms="search" class="form-control"
                placeholder="Search Token ID...">
        </div>

        <!-- Add Button -->
        <div class="mb-2 mb-md-0">
            <a href="{{ route('admin.token-receipt.token') }}" class="btn btn-outline-info">
                + Add New Token Receipt
            </a>
        </div>
    </div>

    <!-- Token Receipts Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-nowrap align-middle text-center">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Token ID</th>
                    <th>Amount</th>
                    <th>Seller</th>
                    <th>Buyer</th>
                    <th>Agent</th>
                    <th>Property</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>PDF</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tokenReceipts as $key => $receipt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $receipt->token_id }}</td>
                        <td>{{ number_format($receipt->token_amount, 2) }}</td>
                        <td>{{ $receipt->seller ? $receipt->seller->seller_name : 'N/A' }}</td>
                        <td>{{ $receipt->buyer ? $receipt->buyer->buyer_name : 'N/A' }}</td>
                        <td>{{ $receipt->agent ? $receipt->agent->name : 'N/A' }}</td>
                        <td>{{ $receipt->property ? $receipt->property->title : 'N/A' }}</td>
                        <td>{{ $receipt->start_date }}</td>
                        <td>{{ $receipt->end_date }}</td>
                        <td>
                            @if($receipt->pdf_url)
                                <a href="{{ asset('storage/'.$receipt->pdf_url) }}" target="_blank">
                                    <i class="fas fa-file-pdf text-danger" style="font-size: 20px;"></i>
                                </a>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center">
                            <div class="alert alert-secondary mb-0">No Token Receipts Found</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-3 d-flex justify-content-center">
        {{ $tokenReceipts->links() }}
    </div>
</div>
