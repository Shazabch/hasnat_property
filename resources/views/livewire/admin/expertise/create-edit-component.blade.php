<div>
    <div class="card">
        <div class="card-body pt-3">
            <div class="d-flex justify-content-end gap-2 align-items-center">
                @if(!$isNew)
                    <a target="_blank" href="{{ route('admin.expertise.preview', $expertise->id) }}" class="btn btn-primary">Preview <i class="fa fa-eye"></i></a>
                @endif
                <button type="submit" class="ml-2 btn btn-primary" wire:loading.attr="disabled" wire:click="save" wire:target="save">Save</button>
            </div>
            <form wire:submit="save">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            
                            <div class="form-group col-md-12">
                                <label>Title</label>
                                <input wire:model.live.debounce.500ms="expertise.title" type="text" class="form-control @error('expertise.title') border border-danger @enderror">
                                @error('expertise.title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label>Slug</label>
                                <input wire:model="expertise.slug" type="text" class="form-control @error('expertise.slug') border border-danger @enderror">
                                @error('expertise.slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label>Short Description</label>
                                <div wire:ignore>
                                    <div class="" x-data x-init="
                                        ClassicEditor
                                        .create($refs.scnt_exp_{{ $expertise->id }})
                                        .then(editor => {
                                            editor.model.document.on('change:data', () => {
                                                @this.set('expertise.short_description', editor.getData(), true);
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
                                    " wire:ignore wire:key="scnt_exp_{{ $expertise->id }}" x-ref="scnt_exp_{{ $expertise->id }}">{!! $expertise->short_description !!}</div>
                                </div>
                                @error('expertise.short_description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-8">
                                <label>Tagline</label>
                                <input wire:model="expertise.tagline" type="text" class="form-control @error('expertise.tagline') border border-danger @enderror">
                                @error('expertise.tagline')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label>Icon</label>
                                <input wire:model="expertise.icon" type="text" class="form-control @error('expertise.icon') border border-danger @enderror">
                                @error('expertise.icon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label>Detail Icon</label>
                                <div class="row">
                                    @if($expertise->detail_icon)
                                    <div class="col-md-4 mb-3 bg-dark text-center">
                                        <img src="{{ asset($expertise->detail_icon) }}" alt="Expertise Detail Icon" class="img-fluid" style="width: 100px; height: 100px;">
                                    </div>
                                    @endif
                                    <div class="col">
                                        <x-filepond-input wire:model="detail_icon" allowImagePreview imagePreviewMaxHeight="50" multiple
                                        allowFileTypeValidation
                                        acceptedFileTypes="['image/*']"
                                        allowFileSizeValidation maxFileSize="20mb" id="exp_detail_icon" />
                                    </div>
                                </div>
                                @error('expertise.detail_icon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-success">
                                        <input type="checkbox" wire:model="expertise.show_on_dashboard" {{ $expertise->show_on_dashboard == 1 ? 'checked' : '' }} />
                                        <span></span>
                                        Show on Homepage
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Flip Card Description (on Dashboard)</label>
                                <div wire:ignore>
                                    <div class="" x-data x-init="
                                        ClassicEditor
                                        .create($refs.flp_card_section_{{ $expertise->id }})
                                        .then(editor => {
                                            editor.model.document.on('change:data', () => {
                                                @this.set('expertise.flip_card_description', editor.getData(), true);
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
                                    " wire:ignore wire:key="flp_card_section_{{ $expertise->id }}" x-ref="flp_card_section_{{ $expertise->id }}">{!! $expertise->flip_card_description !!}</div>
                                </div>
                                @error('expertise.flip_card_description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        
                    
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Status</label>
                                <select wire:model="expertise.status" class="form-control @error('expertise.status') border border-danger @enderror">
                                    <option value="0">Draft</option>
                                    <option value="1">Published</option>
                                </select>
                                @error('expertise.status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <div class="form-group col-md-6">
                                <label>Published At</label>
                                <input wire:model="expertise.published_at" type="datetime-local" class="form-control @error('expertise.published_at') border border-danger @enderror">
                                @error('expertise.published_at')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Image</label>
                            @if($image)
                            <div class="col-md-6 mb-3">
                                <img src="{{ $image->temporaryUrl() }}" alt="Condition Image" class="img-fluid" style="width: 100px; height: 100px;">
                            </div>
                            @elseif($expertise->image)
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <img src="{{ asset($expertise->image) }}" alt="Expertise Image" class="img-fluid" style="width: 100px; height: 100px;">
                                        <a wire:click.prevent="downloadImage" class="btn btn-info btn-sm"><i class="fas fa-download"></i></a>
                                        <a wire:click.prevent="deleteImage" wire:confirm="Are you sure you want to delete this image?" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                            @endif
                            <div class="col">
                                <x-filepond-input wire:model="image" allowImagePreview imagePreviewMaxHeight="50" multiple
                                allowFileTypeValidation
                                acceptedFileTypes="['image/*']"
                                allowFileSizeValidation maxFileSize="20mb" id="exp_image" />
                            </div>
                            @error('expertise.image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Image Alt Text</label>
                            <input wire:model="expertise.image_alt" type="text" class="form-control @error('expertise.image_alt') border border-danger @enderror">
                            @error('expertise.image_alt')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Meta Title</label>
                            <input wire:model="expertise.meta_title" type="text" class="form-control @error('expertise.meta_title') border border-danger @enderror">
                            @error('expertise.meta_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Meta Description</label>
                            <textarea wire:model="expertise.meta_description" class="form-control @error('expertise.meta_description') border border-danger @enderror" rows="3"></textarea>
                            @error('expertise.meta_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label>Meta Keywords</label>
                            <input wire:model="expertise.meta_keywords" type="text" class="form-control @error('expertise.meta_keywords') border border-danger @enderror">
                            @error('expertise.meta_keywords')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}

                        
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Content Sections --}}
    <div class="mt-2">
        <div>
            @if(!$isNew)
                <div>
                    @livewire('admin.quick-facts.listing-component', ['model_type' => 'App\Models\Expertise', 'model_id' => $expertise->id], key('expertise-quick-facts-'.$expertise->id))
                </div>
            @endif
        </div>
        <div>
            @if(!$isNew)
                <div>
                    @livewire('admin.content-section.listing-component', ['contentable_type' => 'App\Models\Expertise', 'contentable_id' => $expertise->id,'showInCard' => true], key('expertise-content-section-'.$expertise->id))
                </div>
            @endif
        </div>
    </div>
</div>