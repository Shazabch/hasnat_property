<div>
    <div class="card">
        <div class="card-body pt-3">
            <div class="d-flex justify-content-end gap-2 align-items-center">

            </div>
            <div>
                <form wire:submit="save">
                    <div class="row gutters-0 mt-3">
                        <div class="col-12">
                            <div class="form-group col-md-12">
                                <label>Name</label>
                                <input wire:model.live.debounce.500ms="rate.title" type="text"
                                    class="form-control @error('rate.title') border border-danger @enderror">
                                @error('rate.title')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label>Slug</label>
                                <input wire:model="rate.slug" readonly type="text"
                                    class="form-control @error('rate.slug') border border-danger @enderror">
                                @error('rate.slug')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label>Status</label>
                                <select wire:model="rate.status"
                                    class="form-control form-select @error('rate.status') border border-danger @enderror">
                                    <option value="">Select</option>
                                    <option value="1">Published</option>
                                    <option value="0">Draft</option>
                                </select>
                                @error('rate.status')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">

                            <!-- Property Description -->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content</label>
                                    <div wire:ignore>
                                        <div class="" x-data x-init="ClassicEditor
                                            .create($refs.rate_content, {

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
                                                        @this.set('rate.content', editor.getData(), true);
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
                                            x-ref="rate_content">{!! $rate->content !!}</div>
                                    </div>
                                    @error('rate.content')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
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
