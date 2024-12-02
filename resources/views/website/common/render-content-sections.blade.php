<section class="section-detail-content bg-cream">
    <div class="list-group-wrap">
        @include('website.common.mobile-content-dropdown', ['contentTabs' => $contentTabs])
          <!-- List group for larger screens -->
        @include('website.common.content-dropdown', ['contentTabs' => $contentTabs])
        <div class="">
            <div class="row justify-content-center py-5">
                <div class="section-detail-content">
                    @foreach ($contentSections as $section)
                    <div class="content" id="section-{{ $section->id }}">
                        <div class="sideby-section {{ getBg($section->bg_type) }}">
                            <div class="container">
                            @if($section->image && $section->image_position == 'full_after')
                                @if($section->title)
                                <h2>{{ $section->title }}</h2>
                                @endif
                                {!! $section->content !!}
                            {{-- Full Width after section --}}
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <div class="img_wrap">
                                        <img src="{{ asset($section->image) }}" alt="{{ $section->image_alt }}">
                                    </div>
                                </div>
                            </div>
                            {{-- Right Image --}}
                            @elseif($section->image && $section->image_position == 'right')
                                <div class="row align-items-center">
                                    <div class="col-lg-6 pe-lg-4 mb-lg-0 mb-3">
                                        @if($section->title)<h2>{{ $section->title }}</h2>@endif
                                        {!! $section->content !!}
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="img_wrap">
                                            <img src="{{ asset($section->image) }}" alt="{{ $section->image_alt }}">
                                        </div>
                                    </div>
                                </div>
                            {{-- Left Image --}}
                            @elseif($section->image && $section->image_position == 'left')
                                <div class="row align-items-center">
                                    <div class="col-lg-6 mb-lg-0 mb-3">
                                        <div class="img_wrap">
                                            <img src="{{ asset($section->image) }}" alt="{{ $section->image_alt }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 ps-lg-4">
                                        @if($section->title)<h2>{{ $section->title }}</h2>@endif
                                        {!! $section->content !!}
                                    </div>
                                </div>
                            {{-- No Image --}}
                            @else
                            @if($section->title)<h2>{{ $section->title }}</h2>@endif
                            {!! $section->content !!}
                            @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>