<?php

namespace App\Livewire\Admin\Tokens;

use App\Models\Properties;
use App\Models\TeamSection;
use App\Models\TokenReipet;
use Livewire\Component;
use Livewire\WithPagination;

class TokenReceiptManagementComponent extends Component
{
    use WithPagination;
    public $agents = [];
    public $properties = [];
    public $tokenReceipts = [];
    public $tokenReceipt;
    public $selectedAgent;
    public $selectedProperty;

    public function rules()
    {
        return [
            'tokenReceipt.token_id' => 'required',
            'tokenReceipt.token_amount' => 'required',
            'tokenReceipt.seller_id' => 'required',
            'tokenReceipt.buyer_id' => 'required',
            'tokenReceipt.agent_id' => 'required',
            'tokenReceipt.property_id' => 'required',
            'tokenReceipt.start_date' => 'required|date',
            'tokenReceipt.end_date' => 'required|date|after_or_equal:tokenReceipt.start_date',
        ];
    }
    public function addNew()
    {
        $this->resetInputFields();
    }
    public function editItem($id)
    {
        $this->tokenReceipt = TokenReipet::find($id);
    }

    public function mount()
    {
        $this->agents = TeamSection::where('designation', 'Agent')->get();
        $this->properties = Properties::all();
        $this->tokenReceipts = TokenReipet::all();
    }
    public function addEntry()
    {
        $this->validate();

        if ($this->tokenReceipt->id) {
            $receipt = TokenReipet::find($this->tokenReceipt->id);
            $message = 'Token Receipt updated successfully';
        } else {
            $receipt = new TokenReipet();
            $message = 'Token Receipt added successfully';
        }

        $receipt->token_id = $this->tokenReceipt->token_id;
        $receipt->token_amount = $this->tokenReceipt->token_amount;
        $receipt->seller_id = $this->tokenReceipt->seller_id;
        $receipt->buyer_id = $this->tokenReceipt->buyer_id;
        $receipt->agent_id = $this->tokenReceipt->agent_id;
        $receipt->property_id = $this->tokenReceipt->property_id;
        $receipt->start_date = $this->tokenReceipt->start_date;
        $receipt->end_date = $this->tokenReceipt->end_date;

        $receipt->save();
        $this->resetInputFields();
        $this->dispatch('success-box', ['message' => $message]);
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

    public function render()
    {
        return view('livewire.admin.tokens.token-receipt-management-component' , [
             'tokenReceipts' => TokenReipet::paginate(10)
        ]);
    }
}
