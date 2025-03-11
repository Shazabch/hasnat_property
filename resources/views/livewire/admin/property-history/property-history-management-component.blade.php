<div>
    <h4 class="mb-4 text-center text-primary">Token Receipt Listing</h4>

    <div class="mb-3 d-flex justify-content-between">
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="Search Token ID..." wire:model="search">
            <button class="btn btn-primary ml-2" wire:click="searchRecords">Search</button>
        </div>

        <a href="{{ route('admin.token-receipt.token') }}" class="btn btn-success">
            + Add New Token Receipt
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Token ID</th>
                    {{-- <th>Amount</th> --}}
                    <th>Seller</th>
                    <th>Buyer</th>
                    <th>Agent</th>
                    <th>Property</th>
                    <th>Commision</th>
                    {{-- <th>Start Date</th>
                    <th>End Date</th> --}}

                </tr>
            </thead>
            <tbody>
                @foreach($propertyHistory as $receipt)
                    <tr>
                        <td>{{ $receipt->token_id }}</td>
                        {{-- <td>{{ number_format($receipt->token_amount, 2) }}</td> --}}
                        <td>{{ $receipt->seller ? $receipt->seller->seller_name : 'N/A' }}</td>
                        <td>{{ $receipt->buyer ? $receipt->buyer->buyer_name : 'N/A' }}</td>
                        <td>{{ $receipt->agent ? $receipt->agent->name : 'N/A' }}</td>
                        <td>{{ $receipt->property ? $receipt->property->title : 'N/A' }}</td>
                        <td>{{ $receipt->agent_comission }}</td>
                        {{-- <td>{{ $receipt->start_date }}</td>
                        <td>{{ $receipt->end_date }}</td> --}}
                            {{-- <td>
                                @if($receipt->pdf_url)
                                    <a href="{{ asset($receipt->pdf_url) }}" class="text-primary" target="_blank">View PDF</a>
                                @else
                                    N/A
                                @endif
                            </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $propertyHistory->links() }} <!-- Pagination -->
    </div>
</div>
