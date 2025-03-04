<div>
    <div class="container py-4">
        <h4 class="mb-4 text-center text-primary">Token Receipt Management</h4>

        @if (session()->has('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
        @endif

        <div class="row g-4">
            <div class="col-md-6">
                <label class="fw-bold">Token ID</label>
                <input type="text" wire:model="tokenReceipt.token_id" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Token Amount</label>
                <input type="text" wire:model="tokenReceipt.token_amount" class="form-control" placeholder="Enter Token Amount">
                @error('tokenReceipt.token_amount') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-lg-6">
                <label class="fw-bold">Seller</label>
                <div class="input-group">
                    <select class="form-select search-dropdown" wire:model="tokenReceipt.seller_id">
                        <option value="">Select Seller</option>
                        @foreach($sellers as $seller)
                            <option value="{{ $seller->id }}">{{ $seller->seller_name }}</option>
                        @endforeach
                    </select>

                </div>
                @error('tokenReceipt.seller_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            @if($isSellerModalOpen)
            <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0, 0, 0, 0.5);">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">Add Seller</h5>
                            <button type="button" class="btn-close" wire:click="closeSellerModal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" wire:model="seller_name" class="form-control mb-2" placeholder="Name">
                            <input type="email" wire:model="seller_email" class="form-control mb-2" placeholder="Email">
                            <input type="text" wire:model="seller_phone" class="form-control mb-2" placeholder="Phone">
                            <input type="text" wire:model="seller_cnic" class="form-control mb-2" placeholder="CNIC">
                            <input type="text" wire:model="seller_address" class="form-control mb-2" placeholder="Address">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeSellerModal">Close</button>
                            <button type="button" class="btn btn-primary" wire:click="saveSeller">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-md-6">
                <label class="fw-bold">Buyer</label>
                <div class="input-group">
                    <select wire:model="tokenReceipt.buyer_id" class="form-select search-dropdown">
                        <option value="">Select Buyer</option>
                        @foreach($buyers as $buyer)
                            <option value="{{ $buyer->id }}">{{ $buyer->buyer_name }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-primary" wire:click="openBuyerModal"><i class="fas fa-plus"></i></button>
                </div>
                @error('tokenReceipt.buyer_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            @if($isBuyerModalOpen)
            <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0, 0, 0, 0.5);">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">Add Buyer</h5>
                            <button type="button" class="btn-close" wire:click="closeBuyerModal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" wire:model="buyer_name" class="form-control mb-2" placeholder="Name">
                            <input type="email" wire:model="buyer_email" class="form-control mb-2" placeholder="Email">
                            <input type="text" wire:model="buyer_phone" class="form-control mb-2" placeholder="Phone">
                            <input type="text" wire:model="buyer_cnic" class="form-control mb-2" placeholder="CNIC">
                            <input type="text" wire:model="buyer_address" class="form-control mb-2" placeholder="Address">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeBuyerModal">Close</button>
                            <button type="button" class="btn btn-primary" wire:click="saveBuyer">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-md-6">
                <label class="fw-bold">Select Agent</label>
                <select wire:model="tokenReceipt.agent_id" class="form-select search-dropdown">
                    <option value="">-- Choose an Agent --</option>
                    @foreach ($agents as $agent)
                        <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Select Property</label>
                <select wire:model="tokenReceipt.property_id" class="form-select search-dropdown">
                    <option value="">-- Choose a Property --</option>
                    @foreach ($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Start Date</label>
                <input type="date" wire:model="tokenReceipt.start_date" class="form-control">
                @error('tokenReceipt.start_date') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-6">
                <label class="fw-bold">End Date</label>
                <input type="date" wire:model="tokenReceipt.end_date" class="form-control">
                @error('tokenReceipt.end_date') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-12 text-center mt-4">
                <button wire:click="addEntry" class="btn btn-primary px-5"><i class="fas fa-save"></i> Save Receipt</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            $('.search-dropdown').select2({
                placeholder: "Select an option",
                allowClear: true
            });
        });

        window.addEventListener('success-box', event => {
            Swal.fire({
                title: 'Success!',
                text: event.detail.message,
                icon: 'success',
            });
        });
    </script>
</div>
