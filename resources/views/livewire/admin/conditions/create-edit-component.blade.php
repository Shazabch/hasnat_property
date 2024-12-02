<div>
    {{-- <div class="bg-info-o-40 p-2 rounded text-center text-white text-info mb-1">
        <h3 class="mb-0">{{ $condition->id ? 'Edit' : 'Create' }} Condition</h3>
    </div> --}}
    <div class="card">
        <div class="card-body pt-3">
            <div class="d-flex justify-content-end gap-2 align-items-center">
                @if(!$isNew)
                    <a target="_blank" href="{{ route('admin.conditions.preview', $condition->id) }}" class="btn btn-primary">Preview <i class="fa fa-eye"></i></a>
                @endif
            </div>
            <div>
                <form wire:submit="save">
                    <div class="row gutters-0 mt-3">

                        <div class="col-md-6">

                            <div class="form-group col-md-12">
                                <label>Title</label>
                                <input wire:model.live.debounce.500ms="condition.title" type="text" class="form-control @error('condition.title') border border-danger @enderror">
                                @error('condition.title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <div class="form-group col-md-12">
                                <label>Slug</label>
                                <input id="{{ $condition->slug }}" wire:model.live.debounce.500ms="condition.slug" type="text" class="form-control @error('condition.slug') border border-danger @enderror">
                                @error('condition.slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>      
    
                            <div class="form-group col-md-12">
                                <label>Short Description</label>
                                <textarea wire:model="condition.short_description" class="form-control @error('condition.short_description') border border-danger @enderror"></textarea>
                                @error('condition.short_description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <div class="form-group col-md-12">
                                <label>Status</label>
                                <select wire:model="condition.status" class="form-control form-select @error('condition.status') border border-danger @enderror">
                                    <option value="1">Published</option>
                                    <option value="0">Draft</option>
                                </select>
                                @error('condition.status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <div class="form-group col-md-12">
                                <label>Published At</label>
                                <input wire:model="condition.published_at" type="date" class="form-control @error('condition.published_at') border border-danger @enderror">
                                @error('condition.published_at')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label>Detail Icon</label>
                                <div class="row">
                                    @if($condition->detail_icon)
                                    <div class="col-md-4 mb-3 bg-dark text-center">
                                        <img src="{{ asset($condition->detail_icon) }}" alt="Condition Detail Icon" class="img-fluid" style="width: 100px; height: 100px;">
                                    </div>
                                    @endif
                                    <div class="col">
                                        <x-filepond-input wire:model="detail_icon" allowImagePreview imagePreviewMaxHeight="50" multiple
                                        allowFileTypeValidation
                                        acceptedFileTypes="['image/*']"
                                        allowFileSizeValidation maxFileSize="20mb" id="con_detail_icon" />
                                    </div>
                                </div>
                                @error('condition.detail_icon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label>Image</label>
                                <div class="row">
                                    @if($image)
                                    <div class="col-md-6 mb-3">
                                        <img src="{{ $image->temporaryUrl() }}" alt="Condition Image" class="img-fluid" style="width: 100px; height: 100px;">
                                    </div>
                                    @elseif($condition->image)
                                        <div class="col-md-6 mb-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <img src="{{ asset($condition->image) }}" alt="Condition Image" class="img-fluid" style="width: 100px; height: 100px;">
                                                <a wire:click.prevent="downloadImage" class="btn btn-info btn-sm"><i class="fas fa-download"></i></a>
                                                <a wire:click.prevent="deleteImage" wire:confirm="Are you sure you want to delete this image?" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col">
                                        <x-filepond-input wire:model="image" allowImagePreview imagePreviewMaxHeight="50" multiple
                                        allowFileTypeValidation
                                        acceptedFileTypes="['image/*']"
                                        allowFileSizeValidation maxFileSize="20mb" id="cond_image" />
                                    </div>
                                </div>
                                
                               
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <div class="form-group col-md-12">
                                <label>Image Alt</label>
                                <input wire:model="condition.image_alt" type="text" class="form-control @error('condition.image_alt') border border-danger @enderror">
                                @error('condition.image_alt')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <div class="form-group col-md-12">
                                <label>Meta Title</label>
                                <input wire:model="condition.meta_title" type="text" class="form-control @error('condition.meta_title') border border-danger @enderror">
                                @error('condition.meta_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label>Meta Description</label>
                                <textarea wire:model="condition.meta_description" class="form-control @error('condition.meta_description') border border-danger @enderror"></textarea>
                                @error('condition.meta_description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            {{-- <div class="form-group col-md-12">
                                <label>Meta Keywords</label>
                                <textarea wire:model="condition.meta_keywords" class="form-control @error('condition.meta_keywords') border border-danger @enderror"></textarea>
                                @error('condition.meta_keywords')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div> --}}
                        </div>

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    {{-- Content Sections --}}
    <div class="mt-2">
        @if(!$isNew)
            <div>
                @livewire('admin.content-section.listing-component', ['contentable_type' => 'App\Models\Condition', 'contentable_id' => $condition->id,'showInCard' => true], key('condition-content-section-'.$condition->id))
            </div>
        @endif
    </div>

</div>
