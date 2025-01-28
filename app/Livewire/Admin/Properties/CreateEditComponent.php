<?php

namespace App\Livewire\Admin\Properties;

use App\Models\Properties;
use App\Models\Specification;
use App\Models\PropertySpecification;
use App\Models\Amenities;
use App\Models\PropertyAmeneties;
use Livewire\Component;
use App\Models\PropertyImages;

use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateEditComponent extends Component
{
    use WithFileUploads;

    public $property;
    public $isNew = false;
    public $photos = [];

    public $main_image;
    public $specifications;
    public $amenities;
    public $specificationsCount = [];
    public $amenitiesCount = [];

    public function mount($property = null)
    {
        $this->property = $property ?? new Properties(['status' => '0']);
        $this->isNew = $property ? false : true;
        $this->specifications = Specification::all();
        $this->amenities = Amenities::all();
        $propertySpecifications = PropertySpecification::where('property_id', $this->property->id)->get();
        foreach ($this->specifications as $index => $specification) {
            $this->specificationsCount[$index] = $propertySpecifications->where('specification_id', $specification->id)->first()->value ?? "0";
        }

        $propertyAmenities = PropertyAmeneties::where('property_id', $this->property->id)->get();
        foreach ($this->amenities as $index => $amenities) {

            $this->amenitiesCount[$index] = $propertyAmenities->where('amenetise_id', $amenities->id)->first()->distance ?? "0";
        }

    }

    /**
     * Explicit edit method to load the property for editing
     */
    public function edit($id)
    {

        $this->property = Properties::findOrFail($id);

        $this->isNew = false;
    }

    public function rules()
    {
        return [
            'property.title' => 'required',
            'property.slug' => 'required|unique:properties,slug,' . $this->property->id,
            'property.featured' => 'nullable|boolean',
            // 'property.main_image' => 'nullable|image|max:2048',
            'property.price' => 'nullable|numeric',
            'property.adress' => 'nullable|string',
            'property.status' => 'nullable|in:0,1',
            'property.area' => 'nullable',
            'property.property_type' => 'nullable|string',
            'property.categories' => 'nullable|string',
            'property.description' => 'nullable|string',
        ];
    }

    public function updatingPropertyTitle($value)
    {
        if ($this->isNew) {
            $this->property->slug = Str::slug($value);
        }
        $this->validateOnly('property.slug');
    }

    public function save()
    {
        $this->validate();

        // Set boolean fields
        $this->property->featured = $this->property->featured ? 1 : 0;
        $this->property->status = $this->property->status ? 1 : 0;

        // Handle the main image
        if ($this->main_image) {
            // Optionally, delete the old image before saving the new one
            deleteFile($this->property->main_image);
            $this->property->main_image = 'storage/' . $this->main_image->store('properties', 'public');
        }

        // Save the property
        $this->property->save();
        #delete all existing specifications for this property
        PropertySpecification::where('property_id', $this->property->id)->delete();
        #save new property specifications
        foreach ($this->specificationsCount as $index => $s_count) {
            PropertySpecification::create([
                'property_id' => $this->property->id,
                'specification_id' => $this->specifications[$index]['id'],
                'value' => $s_count,
            ]);
        }
        #delete all existing specifications for this property
        PropertyAmeneties::where('property_id', $this->property->id)->delete();
        #save new property specifications
        foreach ($this->amenitiesCount as $index => $s_count) {
            PropertyAmeneties::create([
                'property_id' => $this->property->id,
                'amenetise_id' => $this->amenities[$index]['id'],
                'distance' => $s_count,
            ]);
        }
        if (!empty($this->photos)) {
            foreach ($this->photos as $photo) {
                #move photo to property folder
                $saved_photo_path = 'storage/' . $photo->store('properties/' . $this->property->id . '/photos', 'public');
                #save photo path to db
                PropertyImages::create([
                    'property_id' => $this->property->id,
                    'image_name' => $saved_photo_path,
                    'image_type' => '',
                    'is_main' => '0',
                ]);
            }
            $this->photos = [];
        }


        // Dispatch a success message event
        $message = $this->isNew ? 'Property saved successfully' : 'Property updated successfully';
        $this->dispatch('success-box', ['message' => $message]);

        // Redirect to the list page
        return redirect()->route('admin.properties.index');
    }

    public function render()
    {
        return view('livewire.admin.properties.create-edit-component');
    }

    public function downloadMainImage()
    {
        return response()->download(public_path($this->property->main_image));
    }

    public function deleteMainImage()
    {
        deleteFile($this->property->main_image);
        $this->property->update(['main_image' => null]);
        $this->dispatch('success-notification', message: 'Main image deleted successfully');
    }
    public function removePhoto($id)
    {

        $photo = $this->property->photosExceptMain->where('id', $id)->first;
        if ($photo) {
            #delete photo
            deleteFile($photo->image_name);
            $photo->delete();
            $this->property->load('photosExceptMain');
            $this->dispatch('success-notification',  message: 'Image deleted successfully');
        }
    }
}
