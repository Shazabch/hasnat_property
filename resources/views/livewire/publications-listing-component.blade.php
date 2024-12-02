<section class="blog-area py-70 blog-archive section-blog" wire:init="loadFirstTime">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="row filter-row p-0 mb-3">
                    <div class="col-xl-8">
                        <fieldset>
                            <input type="text" name="q" class="search_bar" placeholder="Search here" wire:model.live.debounce.750ms="search">
                            <input type="submit" class="button small slate search-btn" value="Search">
                        </fieldset>
                    </div>
                    <div class="col-xl-4">
                        <div class="d-flex justify-content-end gap-4">
                            <a href="" class="button white revert">
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.10156 7C0.75 7 0.476562 6.72656 0.476562 6.375V1.375C0.476562 1.0625 0.75 0.75 1.10156 0.75C1.41406 0.75 1.72656 1.0625 1.72656 1.375V5.00781C3.25 2.46875 6.02344 0.75 9.22656 0.75C14.0312 0.75 17.9766 4.69531 17.9766 9.5C17.9766 14.3438 14.0312 18.25 9.22656 18.25C6.10156 18.25 3.36719 16.6484 1.80469 14.1875C1.53125 13.7578 1.84375 13.25 2.35156 13.25C2.58594 13.25 2.78125 13.4062 2.89844 13.6016C4.22656 15.6328 6.57031 17 9.22656 17C13.3672 17 16.7266 13.6406 16.7266 9.5C16.7266 5.35938 13.3672 2 9.22656 2C6.41406 2 3.99219 3.52344 2.70312 5.75H6.10156C6.41406 5.75 6.72656 6.0625 6.72656 6.375C6.72656 6.72656 6.41406 7 6.10156 7H1.10156Z" fill="#193154"></path>
                                </svg>
                            </a>
                            <span class="filter-btn button white active">
                                Filter Publications
                                <svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.28125 0H12.8828C13.4688 0 13.9766 0.507812 13.9766 1.09375C13.9766 1.36719 13.8594 1.60156 13.7031 1.79688L9.60156 6.48438V14.0625C9.60156 14.5703 9.17188 15 8.625 15C8.42969 15 8.23438 14.9609 8.03906 14.8047L5.07031 12.5781C4.75781 12.3438 4.60156 11.9531 4.60156 11.5625V6.48438L0.460938 1.79688C0.304688 1.60156 0.226562 1.36719 0.226562 1.09375C0.226562 0.507812 0.695312 0 1.28125 0ZM5.69531 5.85938C5.77344 5.97656 5.85156 6.13281 5.85156 6.25V11.5625L8.35156 13.4766V6.25C8.35156 6.13281 8.39062 5.97656 8.50781 5.85938L12.4922 1.25H1.67188L5.69531 5.85938ZM13.3516 13.125H19.6016C19.9141 13.125 20.2266 13.4375 20.2266 13.75C20.2266 14.1016 19.9141 14.375 19.6016 14.375H13.3516C13 14.375 12.7266 14.1016 12.7266 13.75C12.7266 13.4375 13 13.125 13.3516 13.125ZM12.7266 7.5C12.7266 7.1875 13 6.875 13.3516 6.875H19.6016C19.9141 6.875 20.2266 7.1875 20.2266 7.5C20.2266 7.85156 19.9141 8.125 19.6016 8.125H13.3516C13 8.125 12.7266 7.85156 12.7266 7.5ZM15.8516 0.625H19.6016C19.9141 0.625 20.2266 0.9375 20.2266 1.25C20.2266 1.60156 19.9141 1.875 19.6016 1.875H15.8516C15.5 1.875 15.2266 1.60156 15.2266 1.25C15.2266 0.9375 15.5 0.625 15.8516 0.625Z" fill="white"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="col-lg-12">                  
                <div class="row p-0">
                    <div class="col-12 filters-col">
                        <div class="box">
                            <div class="row w-100 p-0">
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <fieldset>
                                        <h4>Type</h4>
                                        <div class="cat">
                                            <label class="{{ $selectedType == null ? 'active' : '' }}">
                                                <input type="checkbox" wire:click="$set('selectedType', null)" value="">
                                                <span>All</span>
                                            </label>
                                        </div>
                                        @foreach ($types as $type)  
                                        <div class="cat">
                                            <label class="{{ $selectedType == $type->id ? 'active' : '' }}">
                                                <input type="checkbox" wire:click="$set('selectedType', {{ $type->id }})" value="{{ $type->id }}" id="type-{{ $type->id }}">
                                                <span>{{ $type->name }}</span>
                                            </label>
                                        </div>
                                        @endforeach
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <h4>Topics</h4>
                                        <div class="cat">
                                            <label class="{{ $selectedTopic == null ? 'active' : '' }}">
                                                <input type="checkbox" wire:click="$set('selectedTopic', null)" id="topic-all">
                                                <span>All</span>
                                            </label>
                                        </div>
                                        @foreach ($topics as $topic)
                                        <div class="cat">
                                            <label class="{{ $selectedTopic == $topic->id ? 'active' : '' }}">
                                                <input type="checkbox" wire:click="$set('selectedTopic', {{ $topic->id }})" id="topic-{{ $topic->id }}">
                                                <span>{{ $topic->name }}</span>
                                            </label>
                                        </div>
                                        @endforeach
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                    
        </div>
        <div class="row">
            @foreach ($publications as $publication)
            <div class="col-lg-4 col-sm-6 mb-4" data-aos="fade-down" data-aos-duration="2000" data-aos-delay="100"> 
                @include('website.publications.card', ['publication' => $publication])
            </div>
            @endforeach
            @if(!count($publications))
            <div class="col-lg-12">
                <div class="alert alert-light text-center">
                    No publications found.
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
