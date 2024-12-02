<?php

namespace App\Livewire\Admin\ContentSection;

use App\Models\ContentSection;
use Illuminate\Mail\Mailables\Content;
use Livewire\Component;

class ListingComponent extends Component
{
    public $contentable_type;
    public $contentable_id;
    public $showInCard = false;

    public function addNewContentSection()
    {
        $contentSection = new ContentSection();
        $contentSection->contentable_type = $this->contentable_type;
        $contentSection->contentable_id = $this->contentable_id;
        $contentSection->order=ContentSection::where('contentable_type',$this->contentable_type)->where('contentable_id',$this->contentable_id)->max('order')+1;
        $contentSection->save();
        $this->dispatch('success-notification',message: 'Content section added');
    }

    public function addNewImageContentSection()
    {
        $contentSection = new ContentSection();
        $contentSection->contentable_type = $this->contentable_type;
        $contentSection->contentable_id = $this->contentable_id;
        $contentSection->type = 'image';
        $contentSection->order=ContentSection::where('contentable_type',$this->contentable_type)->where('contentable_id',$this->contentable_id)->max('order')+1;
        $contentSection->save();
        $this->dispatch('success-notification',message: 'Content section added');
    }

    public function deleteContentSection($id)
    {
        $contentSection = ContentSection::find($id);
        if($contentSection){
            $contentSection->delete();
            $this->dispatch('success-notification',message: 'Content section deleted successfully');
        }else{
            $this->dispatch('error-notification',message: 'Content section not found');
        }
    }

    public function updateOrder($items)
    {
        foreach($items as $item){
            ContentSection::where('id',$item['value'])->update(['order' => $item['order']]);
        }
        $this->dispatch('success-notification',message: 'Content section order updated');
    }

    public function render()
    {
        $contentSections = ContentSection::where('contentable_type', $this->contentable_type)
            ->where('contentable_id', $this->contentable_id)
            ->orderBy('order', 'asc')
            ->get();
        return view('livewire.admin.content-section.listing-component', compact('contentSections'));
    }
}
