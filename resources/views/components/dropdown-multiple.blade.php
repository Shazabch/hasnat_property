@props(['type','placeholder' => 'Select', 'id','defer' => true,'addEmpty' => false])
<div
    wire:ignore
    x-data ="{count:0,
                initializeFilter() {
                    const select = $refs.{{ $id }}
                    if(this.count>0){
                        $(select).select2().empty();
                    }
                    $(select).select2({
                        placeholder: '{{ $placeholder }}',
                        allowClear: true,
                        tags: true,
                        ajax: {
                            url: '{{ route('filters') }}',
                            delay: 500,
                            data: function (params) {
                              var query = {
                                search: params.term,
                                type: '{{ $type }}',
                              }

                              // Query parameters will be ?search=[term]&type=bl_no
                              return query;
                            },
                            processResults: function (data) {
                                //add an option with key 'empty' and value 'empty'
                                const addEmpty = '{{ $addEmpty }}';
                                if(addEmpty){
                                    data.data.unshift({id: 'empty', text: 'empty'});
                                }
                                // Transforms the top-level key of the response object from 'items' to 'results'
                                return {
                                  results: data.data
                                };
                              }
                        }
                    });

                    let initialSelect;
                    if(@this!==undefined){
                        initialSelect= @this.get( '{{ $attributes->whereStartsWith('wire:model')->first() }}');
                    }
                    (initialSelect == null || initialSelect == 'undefined') ? initialSelect = '' : initialSelect;
                        if (initialSelect !== null && typeof initialSelect === 'object') {
                            console.log('initialSelect object',initialSelect);
                            var options = initialSelect.map(function(item) {
                                return new Option(item, item, true, true);
                            });
                            $(select).append(options).trigger('change');
                        }



                    if(this.count<1){
                        $(select).on('select2:select select2:unselect', function (e) {
                            var selected = $(select).val();
                           @this.set('{{ $attributes->whereStartsWith('wire:model')->first() }}',selected,{{ $defer }});
                       });
                       $(select).on('select2:clear', function (e) {
                            @this.set('{{ $attributes->whereStartsWith('wire:model')->first() }}',null,{{ $defer }});
                        });
                        this.count=this.count+1;
                    }

                }
            }"
    x-init="
    initializeFilter()
    "
    {{-- x-on:re-init-select-2-component.window="initializeFilter()" --}}
>
    <select {{ $attributes }} multiple="multiple" id="{{ $id }}" x-ref="{{ $id }}" data-placeholder="{{ $placeholder }}">
    </select>
</div>
