<div>
    <h4 class="mb-4">Token Receipt Management</h4>

    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="fw-bold">Token ID</label>
            <input type="text" wire:model="tokenReceipt.token_id" class="form-control" placeholder="Enter Token ID">
            @error('tokenReceipt.token_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label class="fw-bold">Token Amount</label>
            <input type="text" wire:model="tokenReceipt.token_amount" class="form-control" placeholder="Enter Token Amount">
            @error('tokenReceipt.token_amount') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label class="fw-bold">Seller </label>
            <input type="text" wire:model="tokenReceipt.seller_id" class="form-control" placeholder="Enter Seller ID">
            @error('tokenReceipt.seller_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label class="fw-bold">Buyer </label>
            <input type="text" wire:model="tokenReceipt.buyer_id" class="form-control" placeholder="Enter Buyer ID">
            @error('tokenReceipt.buyer_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label for="agent" class="fw-bold">Select Agent</label>
            <select wire:model="tokenReceipt.agent_id" id="agent" class="form-control search-dropdown">
                <option value="">-- Choose an Agent --</option>
                @foreach ($agents as $agent)
                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4 mb-3">
            <label for="property" class="fw-bold">Select Property</label>
            <select wire:model="tokenReceipt.property_id" id="property" class="form-control search-dropdown">
                <option value="">-- Choose a Property --</option>
                @foreach ($properties as $property)
                    <option value="{{ $property->id }}">{{ $property->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4 mb-3">
            <label class="fw-bold">Start Date</label>
            <input type="date" wire:model="tokenReceipt.start_date" class="form-control">
            @error('tokenReceipt.start_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label class="fw-bold">End Date</label>
            <input type="date" wire:model="tokenReceipt.end_date" class="form-control">
            @error('tokenReceipt.end_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="col-12 mt-3">
            <button wire:click="addEntry" class="btn btn-primary">Save Receipt</button>
        </div>
    </div>
</div>
<div>
    <script>
        window.addEventListener('success-box', event => {
            Swal.fire({
                title: 'Success!',
                text: event.detail.message,
                icon: 'success',
            });
        });
    </script>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        new TomSelect("#property", {
            create: false,
            sortField: { field: "text", direction: "asc" }
        });
    });
    </script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        new TomSelect(".search-dropdown", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
    });
    </script>
