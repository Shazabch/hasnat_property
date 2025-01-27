<div>
    <div class="card">
        <div class="card-body pt-3">
            <div class="d-flex justify-content-end gap-2 align-items-center">

            </div>
            <div>
                <form wire:submit="save">
                    <div class="row gutters-0 mt-3">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label>Name</label>
                                <input wire:model.live.debounce.500ms="project.title" type="text"
                                    class="form-control @error('project.title') border border-danger @enderror">
                                @error('project.title')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label>Slug</label>
                                <input wire:model="project.slug" readonly type="text"
                                    class="form-control @error('project.slug') border border-danger @enderror">
                                @error('project.slug')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>



                            <div class="form-group col-md-12">
                                <label>Status</label>
                                <select wire:model="project.status"
                                    class="form-control form-select @error('project.status') border border-danger @enderror">
                                    <option value="1">Published</option>
                                    <option value="0">Draft</option>
                                </select>
                                @error('project.status')
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
                                        <img src="{{ $image->temporaryUrl() }}" alt="Testimonial Image"
                                            class="img-fluid" style="width: 100px; height: 100px;">
                                    </div>
                                    @elseif($project->image)
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <img src="{{ asset($project->image) }}" alt="Testimonial Image"
                                                class="img-fluid" style="width: 100px; height: 100px;">
                                            <a wire:click.prevent="downloadImage" class="btn btn-info btn-sm"><i
                                                    class="fas fa-download"></i></a>
                                            <a wire:click.prevent="deleteImage"
                                                wire:confirm="Are you sure you want to delete this image?"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="col">
                                        <x-filepond-input wire:model="image" allowImagePreview
                                            imagePreviewMaxHeight="50" multiple allowFileTypeValidation
                                            acceptedFileTypes="['image/*']" allowFileSizeValidation maxFileSize="20mb"
                                            id="testimonial_image" />
                                    </div>
                                </div>

                                @error('image')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label>Image Alt</label>
                                <input wire:model="project.image_alt" type="text"
                                    class="form-control @error('project.image_alt') border border-danger @enderror">
                                @error('project.image_alt')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- Property Description -->



                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <textarea wire:model="project.description" rows="4"
                                class="form-control @error('project.description') border border-danger @enderror"></textarea>
                            @error('project.description')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Content</label>
                                <div wire:ignore>
                                    <div class="" x-data x-init="
                                    ClassicEditor
                                    .create($refs.project_content)
                                    .then(editor => {
                                        editor.model.document.on('change:data', () => {
                                            @this.set('project.content', editor.getData(), true);
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
                                " wire:ignore x-ref="project_content">{!! $project->content !!}</div>
                                </div>
                                @error('project.content')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled"
                                wire:loading.class="opacity-50 cursor-not-allowed">Save</button>
                            @if($isNew)
                            <button wire:click.prevent="save(true)" class="btn btn-primary" wire:loading.attr="disabled"
                                wire:loading.class="opacity-50 cursor-not-allowed">Save & Add Another</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>