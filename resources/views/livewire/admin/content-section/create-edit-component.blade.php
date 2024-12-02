<div>
    @php
        $form_group_mb = 'mb-2';
    @endphp
    <div class="{{ $showInCard ? 'card mb-2' : '' }} ">
        <div class="{{ $showInCard ? 'card-body p-2' : '' }}">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="btn btn-light btn-sm"  wire:sortable.handle>
                    <i class="fas fa-arrows-alt"></i>
                </span>
                <button wire:confirm="Are you sure you want to delete this content section?" wire:click="$parent.deleteContentSection('{{ $contentSection->id }}')" wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed" class="btn btn-danger btn-sm">Delete</button>
            </div>
            <form wire:submit="save">
                <div class="row">
                    {{-- Left Side --}}
                    <div class="col-md-8">
                        
                        <div class="form-group {{ $form_group_mb }}">
                            <label for="tab_heading">Tab Heading</label>
                            <input type="text" class="form-control form-control-sm" id="tab_heading" wire:model="contentSection.tab_heading">
                            @error('contentSection.tab_heading')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group {{ $form_group_mb }}">
                            <label for="title">Title</label>
                            <input type="text" class="form-control form-control-sm" id="title" wire:model="contentSection.title">
                            @error('contentSection.title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group {{ $form_group_mb }}">
                            <label for="content">Content</label>
                            <div wire:ignore>
                                <div class="" x-data x-init="
                                    ClassicEditor
                                    .create($refs.scnt_sec_{{ $contentSection->id }})
                                    .then(editor => {
                                        editor.model.document.on('change:data', () => {
                                            @this.set('contentSection.content', editor.getData(), true);
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
                                " wire:ignore wire:key="scnt_sec_{{ $contentSection->id }}" x-ref="scnt_sec_{{ $contentSection->id }}">{!! $contentSection->content !!}</div>
                            </div>
                            @error('contentSection.content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    {{-- Right Side --}}
                    <div class="col-md-4">
                        <div class="form-group {{ $form_group_mb }}">
                            <label for="image">Image</label>
                            @if($image)
                                <div class="mb-3">
                                    <img src="{{ $image->temporaryUrl() }}" alt="Condition Image" class="img-fluid" style="width: 100px; height: 100px;">
                                </div>
                            @elseif ($contentSection->image)
                                <div class="d-flex justify-content-between align-items-center">
                                    <img src="{{ asset($contentSection->image) }}" alt="Condition Image" class="img-fluid" style="width: 100px; height: 100px;">
                                    <a wire:click.prevent="downloadImage" class="btn btn-info btn-sm"><i class="fas fa-download"></i></a>
                                    <a wire:click.prevent="deleteImage" wire:confirm="Are you sure you want to delete this image?" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </div>
                            @endif
                            <x-filepond-input wire:model="image" allowImagePreview imagePreviewMaxHeight="50" multiple
                            allowFileTypeValidation
                            acceptedFileTypes="['image/*']"
                            allowFileSizeValidation maxFileSize="2mb" id="content_image_{{ $contentSection->id }}" />
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        
                        
                        <div class="row">
                            <div class="form-group col-md-6 {{ $form_group_mb }}">
                                <label for="image_alt">Image Alt</label>
                                <input type="text" class="form-control form-control-sm" id="image_alt" wire:model="contentSection.image_alt">
                                @error('contentSection.image_alt')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 {{ $form_group_mb }}">
                                <label for="image_position">Image Position</label>
                                <select class="form-control form-control-sm" id="image_position" wire:model="contentSection.image_position">
                                    @foreach ($image_positions as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('contentSection.image_position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 {{ $form_group_mb }}">
                                <label for="bg_type">Section Background</label>
                                <select class="form-control form-control-sm" id="bg_type" wire:model="contentSection.bg_type">
                                    @foreach ($bg_types as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('contentSection.bg_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            

                            {{-- <div class="form-group col-md-12 {{ $form_group_mb }}">
                                <label for="status">Status</label>
                                <input type="checkbox" class="form-control form-control-sm" id="status" wire:model="contentSection.status">
                                @error('contentSection.status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}
                        </div>
                        
                    </div>
                
                    <div class="form-group col-md-12 mb-2">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
