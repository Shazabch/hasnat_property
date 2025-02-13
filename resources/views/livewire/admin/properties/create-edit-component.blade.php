<div>
    <style>
    .btn-check:checked+.btn {
        background-color: #007bff;
        /* Primary Color */
        color: #fff;
        border-color: #0056b3;
    }

    .btn-check:focus+.btn {
        outline: 2px solid #0056b3;
        /* Focus Outline */
    }

    .card.cursor-pointer {
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card.cursor-pointer:hover {
        transform: scale(1.02);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .card.border-primary {
        border: 2px solid #007bff;
    }

    .card.border-success {
        border: 2px solid #28a745;
    }

    .card.border-warning {
        border: 2px solid #ffc107;
    }
    .theme_img_box  {
    width:  200px;
    height:  112.5px;
    margin:  5px;
    position:  relative;
    display:  inline-block;
    background-color:  #eeeeee;
}
.theme_img_box img  {
    max-width:  100%;
    max-height:  100%;
    width:  auto;
    height:  auto;
    object-fit:  cover;
    top:  50%;
    left:  50%;
    transform:  translate(-50%,  -50%);
    position:  absolute;
}
.theme_img_box button,  .theme_img_box button:focus,  .theme_img_box button:hover  {
    position:  absolute;
    background-color:  var(--theme-color-secondary);
    top:  0;
    right:  0;
    outline:  none;
    box-shadow:  none;
    border:  none;
}
    </style>

    <div class="card">
        <div class="card-body pt-3">
            <form wire:submit="save">
                <div class="row">
                    <!-- Property Title and Slug in one line -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Featured</label>
                            <div class="checkbox-inline">
                                <label class="checkbox checkbox-success">
                                    <input type="checkbox" wire:model="property.featured"
                                        {{ $property->featured ? 'checked' : '' }} />
                                    <span></span>
                                    Mark as Featured
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Title</label>
                            <input wire:model.live.debounce.900ms="property.title" type="text"
                                class="form-control @error('property.title') border border-danger @enderror">
                            @error('property.title')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Slug</label>
                            <input wire:model="property.slug" type="text"
                                class="form-control @error('property.slug') border border-danger @enderror" readonly>
                            @error('property.slug')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Property Address and Area in one line -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address</label>
                            <input wire:model="property.adress" type="text"
                                class="form-control @error('property.adress') border border-danger @enderror">
                            @error('property.adress')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Area </label>
                            <input wire:model="property.area" type="number"
                                class="form-control @error('property.area') border border-danger @enderror">
                            @error('property.area')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="property-size">Property Size</label>
                            <select wire:model="property.marla" id="property-size" class="form-control @error('property.marla') border border-danger @enderror">
                                <option value="">Select Size</option>
                                <option value="sq_ft">Square Feet</option>
                                <option value="marla">Marla</option>
                                <option value="kanal">Kanal</option>
                            </select>
                            @error('property.marla')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Property Price and Featured in one line -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Price</label>
                            <input wire:model="property.price" type="number"
                                class="form-control @error('property.price') border border-danger @enderror">
                            @error('property.price')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                    <!-- Property Status and Main Image in one line -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select wire:model="property.status"
                                class="form-control @error('property.status') border border-danger @enderror">
                                <option value="0">Draft</option>
                                <option value="1">Published</option>
                            </select>
                            @error('property.status')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Property Type</label>
                            <select wire:model="property.type" class="form-control @error('property.type') border border-danger @enderror">
                                <option value="">Select</option>
                                <option value="sale">For Sale</option>
                                <option value="rent">To Rent</option>
                            </select>
                            @error('property.type')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Main Image</label>
                            @if ($main_image)
                            <div class="col-md-6 mb-3">
                                <img src="{{ $main_image->temporaryUrl() }}" alt="Property Image" class="img-fluid"
                                    style="width: 100px; height: 100px;">
                            </div>
                            @elseif($property->main_image)
                            <div class="col-md-6 mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <img src="{{ asset($property->main_image) }}" alt="Property Image" class="img-fluid"
                                        style="width: 100px; height: 100px;">
                                    <a wire:click.prevent="downloadMainImage" class="btn btn-info btn-sm"><i
                                            class="fas fa-download"></i></a>
                                    <a wire:click.prevent="deleteMainImage"
                                        wire:confirm="Are you sure you want to delete this image?"
                                        class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                            @endif
                            <div class="col">
                                <x-filepond-input wire:model="main_image" allowImagePreview imagePreviewMaxHeight="50"
                                    multiple allowFileTypeValidation acceptedFileTypes="['image/*']"
                                    allowFileSizeValidation maxFileSize="20mb" id="property_main_image" />
                            </div>
                            @error('property.main_image')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Add Photos</label>
                            <div>
                                @foreach ($property->photosExceptMain as $photo)
                                <div class="theme_img_box">
                                    <img src="{{ asset($photo->image_name) }}" class="" alt=" " />
                                    <button wire:click.prevent="removePhoto({{ $photo->id }})"
                                     wire:confirm="Are you sure you want to delete this image?"
                                        class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                                @endforeach
                            </div>
                            <div class="col">
                                <x-filepond-input wire:model="photos" multiple allowImagePreview
                                    imagePreviewMaxHeight="200" allowFileTypeValidation
                                    acceptedFileTypes="['image/jpeg', 'image/png','image/jpg']" allowFileSizeValidation
                                    maxFileSize="20mb" id="property_all_image" />
                            </div>
                        </div>
                    </div>
                    <!-- Property Type and Categories in one line -->
                    <!-- Categories and Property Type Selection -->

                    <!-- Categories Selection -->
                    <div class="form-group col-md-12">
                        <label class="mb-2">Categories</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card cursor-pointer text-center p-3
                    {{ $property->categories === 'apartment' ? 'border-primary' : '' }}"
                                    wire:click="$set('property.categories', 'apartment')">
                                    <div class="card-body">
                                        <i class="fas fa-city fa-2x text-primary"></i>
                                        <h5 class="mt-2">Apartment</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card cursor-pointer text-center p-3
                    {{ $property->categories === 'house' ? 'border-success' : '' }}"
                                    wire:click="$set('property.categories', 'house')">
                                    <div class="card-body">
                                        <i class="fas fa-home fa-2x text-success"></i>
                                        <h5 class="mt-2">House</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card cursor-pointer text-center p-3
                    {{ $property->categories === 'shop' ? 'border-warning' : '' }}"
                                    wire:click="$set('property.categories', 'shop')">
                                    <div class="card-body">
                                        <i class="fas fa-store fa-2x text-warning"></i>
                                        <h5 class="mt-2">Shop</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('property.categories')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Property Type Selection -->
                    <div class="form-group col-md-12">
                        <label class="mb-2">Property Type</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card cursor-pointer text-center p-3
                    {{ $property->property_type === 'commercial' ? 'border-primary' : '' }}"
                                    wire:click="$set('property.property_type', 'commercial')">
                                    <div class="card-body">
                                        <i class="fas fa-building fa-2x text-primary"></i>
                                        <h5 class="mt-2">Commercial</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card cursor-pointer text-center p-3
                    {{ $property->property_type === 'residential' ? 'border-success' : '' }}"
                                    wire:click="$set('property.property_type', 'residential')">
                                    <div class="card-body">
                                        <i class="fas fa-home fa-2x text-success"></i>
                                        <h5 class="mt-2">Residential</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card cursor-pointer text-center p-3
                    {{ $property->property_type === 'plot' ? 'border-warning' : '' }}"
                                    wire:click="$set('property.property_type', 'plot')">
                                    <div class="card-body">
                                        <i class="fas fa-map fa-2x text-warning"></i>
                                        <h5 class="mt-2">Plot</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('property.property_type')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- Specifications --}}
                    <div class="col-lg-12">
                        <div class="card p-4 mb-3 mt-3">
                            <p class="fs-18 mb-3 fw-500">Specifications</p>
                            <div class="row">
                                @foreach ($specifications as $index => $specification)
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="spec{{ $index }}">{{ $specification->name }}</label>
                                        <select class="form-control" id="spec{{ $index }}"
                                            wire:model.defer="specificationsCount.{{ $index }}">
                                            @if (in_array($specification->name, ['Garage']))
                                            <option value="0">Select</option>
                                            <option value="Single">Single</option>
                                            <option value="Double">Double</option>
                                            <option value="No">No</option>
                                            @elseif (in_array($specification->name, ['Balcony', 'Parking']))
                                            <option value="0">Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                            @elseif (in_array($specification->name, ['Furnish Type']))
                                            <option>Furnished</option>
                                            <option>Partly Furnished</option>
                                            <option>UnFurnished</option>

                                            @else
                                            @for ($i = 0; $i < 11; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                                @endif
                                        </select>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                    {{-- Amenities --}}
                    <div class="col-lg-12">
                        <div class="card p-4 mt-3 mb-2">
                            <p class="fs-18 mb-3 fw-500">Amenities</p>
                            <div class="row">
                                @foreach ($amenities as $index => $facility)
                                <div class="col-lg-2 col-md-3 col-sm-4 mb-3">
                                    <div class="form-group">
                                        <label for="facility-{{ $facility->id }}">{{ $facility->name }}</label>
                                        <input type="number" min="0" step="0.1" class="form-control"
                                            wire:model.defer="amenitiesCount.{{ $index }}"
                                            id="facility-{{ $facility->id }}" placeholder="In Kms" />
                                    </div>
                                    @error('amenitiesCount.' . $index)
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    {{-- <!-- Property Description -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <div wire:ignore>
                                <div class="" x-data x-init="
                                    ClassicEditor
                                    .create($refs.property_desc)
                                    .then(editor => {
                                        editor.model.document.on('change:data', () => {
                                            @this.set('property.description', editor.getData(), true);
                                        }),
                                        editor.dataProcessor.writer.setRules('br',
                                        {
                                            indent: false,
                                            breakBeforeOpen: false,
                                            breakAfterOpen: false,
                                            breakBeforeClose: false,
                                            breakAfterClose: false
                                        });
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });
                                " wire:ignore x-ref="property_desc">{!! $property->description !!}</div>
                            </div>
                            @error('property.description')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Content</label>
                            <div wire:ignore>
                                <div class="" x-data x-init="ClassicEditor
                                    .create($refs.property_desc, {

                                        toolbar: {
                                            items: [
                                                'heading',
                                                '|',
                                                'bold',
                                                'italic',
                                                'link',
                                                'bulletedList',
                                                'numberedList',
                                                '|',
                                                'outdent',
                                                'indent',
                                                '|',
                                                'imageUpload',
                                                'blockQuote',
                                                'insertTable',
                                                'mediaEmbed',
                                                'undo',
                                                'redo'
                                            ]
                                        },
                                        simpleUpload: {
                                            uploadUrl: '{{ route('admin.image.upload') }}',
                                            headers: {
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            }
                                        }
                                    })
                                    .then(editor => {
                                        editor.model.document.on('change:data', () => {
                                                @this.set('property.description', editor.getData(), true);
                                            }),
                                            editor.dataProcessor.writer.setRules('br', {
                                                indent: false,
                                                breakBeforeOpen: false,
                                                breakAfterOpen: false,
                                                breakBeforeClose: false,
                                                breakAfterClose: false
                                            });
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });" wire:ignore
                                    x-ref="property_desc">{!! $property->description !!}</div>
                            </div>
                            @error('property.description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                </div>

                <!-- Save and Back to List Buttons -->
                <div class="d-flex justify-content-end gap-2 align-items-center">
                    <button type="submit" class="btn btn-primary m-3" wire:loading.attr="disabled" wire:click="save"
                        wire:target="save">
                        Save
                    </button>
                    <a href="{{ route('admin.properties.index') }}" class="btn btn-success m-2">
                        Back to List
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
window.addEventListener('success-box', event => {
    Swal.fire({
        position: "center",
        icon: "success",
        title: 'data saved successfully',
        showConfirmButton: false,
        timer: 1500
    });
})
</script>
