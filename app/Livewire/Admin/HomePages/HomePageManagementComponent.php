<?php

namespace App\Livewire\Admin\HomePages;

use App\Models\HomePage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class HomePageManagementComponent extends Component
{
    use WithPagination, WithFileUploads;

    // Section A
    public $title1, $sec_title1, $content1, $image1;

    // Section B
    public $main_title2, $sub_title2, $third_title2, $content2, $image2;

    public $homePageId = null;
    public $search = '';
    public $perPage = 10;

    public $image_1_name;
    public $image_2_name;

    public function rules()
    {
        return [
            'title1' => 'nullable|string',
            'sec_title1' => 'nullable|string',
            'content1' => 'nullable|string',
            'image1' => 'nullable',
            'main_title2' => 'nullable|string',
            'sub_title2' => 'nullable|string',
            'third_title2' => 'nullable|string',
            'content2' => 'nullable|string',
            'image2' => 'nullable',
        ];
    }

    public function addNew()
    {
        $this->resetInputFields();
    }

    public function editItem()
    {
        $homePage = HomePage::latest()->first();
        if ($homePage) {
            $this->homePageId = $homePage->id;

            // Section A
            $this->title1 = $homePage->title1;
            $this->sec_title1 = $homePage->sec_title1;
            $this->content1 = $homePage->content1;
            // $this->image1 = $homePage->image1;

            // Section B
            $this->main_title2 = $homePage->main_title2;
            $this->sub_title2 = $homePage->sub_title2;
            $this->third_title2 = $homePage->third_title2;
            $this->content2 = $homePage->content2;
            // $this->image2 = $homePage->image2;
        }
    }


    public function saveEntry()
    {
        $this->validate();

        $homePage = HomePage::latest()->first();
        // Section A
        $homePage->title1 = $this->title1;
        $homePage->sec_title1 = $this->sec_title1;
        $homePage->content1 = $this->content1;
        if ($this->image_1_name) {
            $homePage->image1 =$this->image_1_name->store('uploads', 'public');
        }

        // Section B
        $homePage->main_title2 = $this->main_title2;
        $homePage->sub_title2 = $this->sub_title2;
        $homePage->third_title2 = $this->third_title2;
        $homePage->content2 = $this->content2;
        if ($this->image_2_name) {
            $homePage->image2 =$this->image_2_name->store('uploads', 'public');
        }

        $homePage->save();

        // $this->resetInputFields();
            $message = $this->homePageId ? 'Home Page section updated successfully.' : 'Home Page section saved successfully.';
        $this->dispatch('success-box', ['message' => $message]);

        // Redirect to the desired page (e.g., HomePage listing page)
        return redirect()->route('admin.home-pages.index');
    }

    private function resetInputFields()
    {
        // Reset Section A fields
        $this->title1 = $this->sec_title1 = $this->content1 = $this->image1 = '';

        // Reset Section B fields
        $this->main_title2 = $this->sub_title2 = $this->third_title2 = $this->content2 = $this->image2 = '';

        $this->homePageId = null;
    }

    public function render()
    {
        $homePages = HomePage::where('title1', 'like', '%' . $this->search . '%')
            ->orWhere('sec_title1', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage);

        return view('livewire.admin.home-pages.home-page-management-component', [
            'homePages' => $homePages,
        ]);
    }
}
