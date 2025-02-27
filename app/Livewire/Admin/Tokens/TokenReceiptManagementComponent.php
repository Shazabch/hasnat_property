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
    public TokenReipet $tokenReceipt;
    public $selectedAgent;
    public $selectedProperty;
    public $editID;

    public function rules()
    {
        return [
            'tokenReceipt.token_id' => 'nullable',
            'tokenReceipt.token_amount' => 'nullable',
            'tokenReceipt.seller_id' => 'nullable',
            'tokenReceipt.buyer_id' => 'nullable',
            'tokenReceipt.agent_id' => 'nullable',
            'tokenReceipt.property_id' => 'nullable',
            'tokenReceipt.start_date' => 'nullable|date',
            'tokenReceipt.end_date' => 'nullable|date',
        ];
    }
    public function addNew()
    {
        $this->resetInputFields();
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
        $this->tokenReceipt = TokenReipet::find($this->editID) ?? new TokenReipet();
    }
    public function addEntry()
    {
        $this->validate();
        $this->tokenReceipt->save();
        $message = 'Token Receipt Saved successfully';
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
    public function resetInputFields()
    {
        $this->tokenReceipt = new TokenReipet();
    }
    public function render()
    {
        return view('livewire.admin.tokens.token-receipt-management-component' , [
             'tokenReceipts' => TokenReipet::paginate(10)
        ]);
    }
}
