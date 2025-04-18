
    <div class="container py-4">
        <div class="card shadow-sm">
        <div class="card-header bg-light text-white d-flex justify-content-between align-items-center">
            <h4 class="text-info">Token Receipt Management</h4>

            <a href="{{ route('admin.token-receipt-list') }}" class="btn btn-outline-info">
                View Token Receipt List
            </a>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        @endif

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <label class="fw-bold">Token ID</label>
                    <input type="text" wire:model="tokenReceipt.token_id" class="form-control" disabled readonly>
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Token Amount</label>
                    <input type="number" wire:model="tokenReceipt.token_amount" class="form-control"
                        placeholder="Enter Token Amount">
                    @error('tokenReceipt.token_amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="tokenReceipt.token_type" class="fw-bold">Token Type</label>
                    <select wire:model="tokenReceipt.token_type" id="tokenReceipt.token_type" class="form-control">
                        <option value="">Select Token Type</option>
                        <option value="conditional">Conditional</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>

                    @error('tokenReceipt.token_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mt-5">
            <div class="col-md-4 mt-5">
                    <label class="fw-bold d-flex align-items-center">
                        Seller
                        <i type="button" class=" fas fa-plus ml-3 text-primary" wire:click="openSellerModal">
                        </i>
                    </label>
                    <div class="input-group">
                        <select class="form-select  " wire:model.live="tokenReceipt.seller_id">
                            <option value="">Select Seller</option>
                            @foreach ($sellers as $seller)
                                <option value="{{ $seller->id }}">{{ $seller->seller_name }}</option>
                            @endforeach
                        </select>

                    </div>
                    @error('tokenReceipt.seller_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4 mt-5">
                    <label class="fw-bold d-flex align-items-center">
                        Buyer
                        <i type="button" class="fas fa-plus ml-3 text-primary" wire:click="openBuyerModal">

                        </i>
                    </label>
                    <div class="input-group">
                        <select wire:model="tokenReceipt.buyer_id" class="form-select  ">
                            <option value="">Select Buyer</option>
                            @foreach ($buyers as $buyer)
                                <option value="{{ $buyer->id }}">{{ $buyer->buyer_name }}</option>
                            @endforeach
                        </select>

                    </div>
                    @error('tokenReceipt.buyer_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4 mt-5">
                    <label class="fw-bold">Select Agent</label>
                    <select wire:model="tokenReceipt.agent_id" class="form-control ">
                        <option value="">Choose an Agent </option>
                        @foreach ($agents as $agent)
                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="row mt-5">

                <div class="col-md-6">
                    <label class="fw-bold">Select Property</label>
                    <select wire:model="tokenReceipt.property_id" class="form-control ">
                        <option value=""> Choose a Property </option>
                        @foreach ($properties as $property)
                            <option value="{{ $property->id }}">{{ $property->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="fw-bold">Comission</label>
                    <input type="number" wire:model="tokenReceipt.agent_comission" class="form-control">
                    @error('tokenReceipt.agent_comission')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <label class="fw-bold">Start Date</label>
                    <input type="date" wire:model="tokenReceipt.start_date" class="form-control">
                    @error('tokenReceipt.start_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="fw-bold">End Date</label>
                    <input type="date" wire:model="tokenReceipt.end_date" class="form-control">
                    @error('tokenReceipt.end_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-12 card-footer text-end mt-5">
                <button wire:click="addEntry" class="btn btn-primary px-5">
                    <i class="fas fa-save"></i> Save Receipt
                </button>
                <button wire:click="openPreviewModal" class="btn btn-info px-5 ms-2" data-bs-toggle="modal" data-bs-target="#previewModal">
                    <i class="fas fa-eye"></i> Preview Invoice
                </button>
            </div>

        </div>
    </div>
    @if ($isSellerModalOpen)
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
                        <input type="text" wire:model="seller_phone" class="form-control mb-2"
                            placeholder="Phone">
                        <input type="text" wire:model="seller_cnic" class="form-control mb-2" placeholder="CNIC">
                        <input type="text" wire:model="seller_address" class="form-control mb-2"
                            placeholder="Address">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeSellerModal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click="saveSeller">Save</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($isBuyerModalOpen)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0, 0, 0, 0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Add Buyer</h5>
                        <button type="button" class="btn-close" wire:click="closeBuyerModal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" wire:model="buyer_name" class="form-control mb-2" placeholder="Name">
                        <input type="email" wire:model="buyer_email" class="form-control mb-2"
                            placeholder="Email">
                        <input type="text" wire:model="buyer_phone" class="form-control mb-2"
                            placeholder="Phone">
                        <input type="text" wire:model="buyer_cnic" class="form-control mb-2" placeholder="CNIC">
                        <input type="text" wire:model="buyer_address" class="form-control mb-2"
                            placeholder="Address">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeBuyerModal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click="saveBuyer">Save</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($isPreviewModalOpen)
    <div class="modal fade show d-block" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="previewModalLabel">Invoice Preview</h5>
                    <button type="button" wire:click="closePreviewModal" class="btn-close btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                </div>
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                    @include('partials.token-invoice')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="closePreviewModal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <style>
        body {
            /* background-color: #f8f9fa; */
            font-family: Arial, sans-serif;
        }

        /* .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 900px;
            margin: auto;
        } */

        h4 {
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #007bff;
        }

        label {
            margin-bottom: 10px;
            display: block;
            font-weight: bold;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .input-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .input-group label {
            flex: 1;
            margin-bottom: 0;
        }

        .input-group select {
            flex: 2;
        }

        .input-group .btn {
            flex: 0.3;
            padding: 10px 15px;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        .btn-secondary {
            background-color: #6c757d;
            padding: 10px 20px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-3px);
        }

        .modal-content {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            background: #007bff;
            color: #ffffff;
            font-weight: bold;
            border-bottom: none;
        }

        .modal-footer .btn-secondary {
            background: #6c757d;
        }

        .search-dropdown {
            width: 100%;
        }

        .text-danger {
            font-size: 12px;
            margin-top: 5px;
            color: #dc3545;
        }

        button:focus,
        select:focus,
        input:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        @media (max-width: 768px) {
            .input-group {
                flex-direction: column;
            }

            .input-group .btn {
                margin-left: 0;
                margin-top: 10px;
            }
        }
    </style>
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
        text: event.detail.message || 'Your Token Receipt has been generated successfully!',
        icon: 'success',
    });
});

    </script>
    <script>
        window.addEventListener('close-modal', event => {
            var modal = document.getElementById('previewModal');
            if (modal) {
                modal.classList.remove('show', 'd-block');
                modal.style.display = 'none';
                document.body.classList.remove('modal-open');
                var backdrop = document.querySelector('.modal-backdrop');
                if (backdrop) {
                    backdrop.remove();
                }
            }
        });
    </script>

</div>
