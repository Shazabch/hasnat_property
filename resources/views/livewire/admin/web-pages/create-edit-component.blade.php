<div>
    <div class="card">
        <div class="card-body pt-3">
            <div class="d-flex justify-content-end gap-2 align-items-center">
                @if(!$isNew)
                    <a target="_blank" href="{{ url('/' . $webPage->slug) }}" class="btn btn-primary">Preview <i class="fa fa-eye"></i></a>
                @endif
            </div>
            <div>
                <form wire:submit="save">
                    <div class="row gutters-0 mt-3">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label>Meta Title</label>
                                <input wire:model.live.debounce.600ms="webPage.meta_title" type="text" class="form-control @error('webPage.meta_title') border border-danger @enderror">
                                @error('webPage.meta_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label>Slug</label>
                                <input id="{{ $webPage->slug }}" wire:model="webPage.slug" type="text" class="form-control @error('webPage.slug') border border-danger @enderror">
                                @error('webPage.slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label>Meta Description</label>
                                <textarea wire:model="webPage.meta_description" class="form-control @error('webPage.meta_description') border border-danger @enderror"></textarea>
                                @error('webPage.meta_description')
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
                                        <img src="{{ $image->temporaryUrl() }}" alt="Web Page Image" class="img-fluid" style="width: 100px; height: 100px;">
                                    </div>
                                    @elseif($webPage->image)
                                        <div class="col-md-6 mb-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <img src="{{ asset($webPage->image) }}" alt="Web Page Image" class="img-fluid" style="width: 100px; height: 100px;">
                                                <a wire:click.prevent="downloadImage" class="btn btn-info btn-sm"><i class="fas fa-download"></i></a>
                                                <a wire:click.prevent="deleteImage" wire:confirm="Are you sure you want to delete this image?" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col">
                                        <x-filepond-input wire:model="image" allowImagePreview imagePreviewMaxHeight="50" multiple
                                        allowFileTypeValidation
                                        acceptedFileTypes="['image/*']"
                                        allowFileSizeValidation maxFileSize="20mb" id="webpage_image" />
                                    </div>
                                </div>
                                
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label>Image Alt</label>
                                <input wire:model="webPage.image_alt" type="text" class="form-control @error('webPage.image_alt') border border-danger @enderror">
                                @error('webPage.image_alt')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>