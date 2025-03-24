<?php

namespace App\Livewire\Admin\Tokens;

use App\Models\Buyer;
use App\Models\Properties;
use App\Models\Seller;
use App\Models\TeamSection;
use App\Models\TokenReipet;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class TokenReceiptManagementComponent extends Component
{
    use WithPagination;
    public $agents = [];
    public $properties = [];
    public $tokenReceipts = [];
    public TokenReipet $tokenReceipt;
    public $selectedAgent;
    public $selectedProperty;
    public $editID;
    public $isSellerModalOpen = false;
    public $isBuyerModalOpen = false;
    public $isPreviewModalOpen = false;
    public $sellers;
    public $buyers;
    public $seller_name, $seller_email, $seller_phone, $seller_cnic, $seller_adress;
    public $buyer_name, $buyer_email, $buyer_phone, $buyer_cnic, $buyer_adress;
    public $selectedBuyer;
    public $selectedSeller;




    public function rules()
    {
        return [
            'tokenReceipt.token_id' => 'nullable|unique:token_reipets,token_id',
            'tokenReceipt.token_amount' => 'required',
            'tokenReceipt.seller_id' => 'required',
            'tokenReceipt.buyer_id' => 'required',
            'tokenReceipt.agent_id' => 'required',
            'tokenReceipt.property_id' => 'required',
            'tokenReceipt.start_date' => 'required|date',
            'tokenReceipt.end_date' => 'required|date',
            'tokenReceipt.token_type' => 'required',
            'tokenReceipt.agent_comission' => 'required',
        ];
    }
    public function addNew()
    {
        $this->resetInputFields();
        $this->generateTokenID();
    }

    public function editItem($id)
    {
        $this->editID = $id;
        $this->tokenReceipt = TokenReipet::find($id);
    }

    public function mount()
    {
        $this->agents = TeamSection::where('designation', 'Agent')->get();
        $this->properties = Properties::all();
        $this->tokenReceipts = TokenReipet::all();
        $this->sellers = Seller::all();
        $this->buyers = Buyer::all();
        $this->tokenReceipt = TokenReipet::find($this->editID) ?? new TokenReipet();
        $this->generateTokenID();
    }
    public function addEntry()
    {
        $this->validate();
        $this->tokenReceipt->save();
        $message = 'Token Receipt Saved successfully';
        $this->generatePDF($this->tokenReceipt->id);
        $this->resetInputFields();
        $this->dispatch('success-box', ['message' => $message]);
    }
    public function edit($id)
    {
        $this->tokenReceipt = TokenReipet::find($id);
    }

    public function delete($id)
    {
        TokenReipet::destroy($id);
        session()->flash('message', 'Token Receipt Deleted Successfully!');
        $this->mount(); // Data reload
    }

    public function generatePDF($id)
    {
        $receipt = TokenReipet::find($id);
        $selectedBuyer = Buyer::find($receipt->buyer_id);
        $selectedSeller = Seller::find($receipt->seller_id);
        $selectedAgent = TeamSection::find($receipt->agent_id);
        $selectedProperty = Properties::find($receipt->property_id);

        $pdf = Pdf::loadView('partials.token-invoice', [
            'tokenReceipt' => $receipt,
            'selectedBuyer' => $selectedBuyer,
            'selectedSeller' => $selectedSeller,
            'selectedAgent' => $selectedAgent,
            'selectedProperty' => $selectedProperty
        ]);
        $directory = 'token_receipts';
        if (!Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->makeDirectory($directory);
        }
        $filename = 'token_receipt_' . $id . '.pdf';
        $filepath = $directory . '/' . $filename;
        Storage::disk('public')->put($filepath, $pdf->output());
        $receipt->pdf_url = $filepath;
        $receipt->save();
    }
    public function generateTokenID()
    {
        $this->tokenReceipt->token_id = 'HSP-' . strtoupper(uniqid());
    }

    public function searchTokenReceipts()
    {
        $query = TokenReipet::query();

        if ($this->selectedAgent) {
            $query->where('agent_id', $this->selectedAgent);
        }

        if ($this->selectedProperty) {
            $query->where('property_id', $this->selectedProperty);
        }

        $this->tokenReceipts = $query->get();
    }
    public function resetInputFields()
    {
        $this->tokenReceipt = new TokenReipet();
    }
    public function openSellerModal()
    {
        $this->resetSellerFields();
        $this->isSellerModalOpen = true; // Open the modal
    }
    public function openBuyerModal()
    {
        $this->resetBuyerFields();
        $this->isBuyerModalOpen = true; // Open the modal
    }

    public function closeSellerModal()
    {
        $this->isSellerModalOpen = false; // Close the modal
    }
    public function closeBuyerModal()
    {
        $this->isBuyerModalOpen = false; // Close the modal
    }


    public function resetSellerFields()
    {
        $this->seller_name = '';
        $this->seller_email = '';
        $this->seller_phone = '';
        $this->seller_cnic = '';
        $this->seller_adress = '';
    }
    public function resetBuyerFields()
    {
        $this->buyer_name = '';
        $this->buyer_email = '';
        $this->buyer_phone = '';
        $this->buyer_cnic = '';
        $this->buyer_adress = '';
    }
    public function saveSeller()
    {
        $this->validate([
            'seller_name' => 'nullable|string|max:255',
            'seller_email' => 'nullable',
            'seller_phone' => 'nullable|string|max:20',
            'seller_cnic' => 'nullable|string|max:20',
            'seller_adress' => 'nullable|string|max:255',
        ]);

        $seller = Seller::create([
            'seller_name' => $this->seller_name,
            'seller_email' => $this->seller_email,
            'seller_phone' => $this->seller_phone,
            'seller_cnic' => $this->seller_cnic,
            'seller_adress' => $this->seller_adress,
        ]);
        $this->tokenReceipt->seller_id = $seller->id;
        $this->closeSellerModal();
        $this->sellers = Seller::all();

        session()->flash('message', 'Seller Added Successfully');
    }
    public function saveBuyer()
    {
        $this->validate([
            'buyer_name' => 'nullable|string|max:255',
            'buyer_email' => 'nullable',
            'buyer_phone' => 'nullable|string|max:20',
            'buyer_cnic' => 'nullable|string|max:20',
            'buyer_adress' => 'nullable|string|max:255',
        ]);
        $buyer = Buyer::create([
            'buyer_name' => $this->buyer_name,
            'buyer_email' => $this->buyer_email,
            'buyer_phone' => $this->buyer_phone,
            'buyer_cnic' => $this->buyer_cnic,
            'buyer_adress' => $this->buyer_adress,
        ]);
        $this->tokenReceipt->buyer_id = $buyer->id;
        $this->closeBuyerModal();
        $this->buyers = Buyer::all();
        session()->flash('message', 'Buyer Added Successfully');
    }

    public function openPreviewModal()
    {
        $this->isPreviewModalOpen = true;
        $this->selectedBuyer = Buyer::find($this->tokenReceipt->buyer_id);
        $this->selectedSeller = Seller::find($this->tokenReceipt->seller_id);
        $this->selectedAgent = TeamSection::find($this->tokenReceipt->agent_id);
        $this->selectedProperty = Properties::find($this->tokenReceipt->property_id);
    }
    public function closePreviewModal()
    {
        $this->isPreviewModalOpen = false;
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.admin.tokens.token-receipt-management-component', [
            'tokenReceipts' => TokenReipet::paginate(10)
        ]);
    }
}
