<div class="col-md-6 col-lg-4 mb-4" data-aos="fade-down" data-aos-duration="2000" data-aos-delay="100">
    <div class="service">
        <div class="front">
            <i class="{{ $expertise->icon }}"></i>
            <h3>{{ $expertise->title }}</h3>
            <p>{{ $expertise->tagline }}</p>
        </div>
        <div class="back">
            <div class="card_back-content">
                {!! $expertise->flip_card_description !!}
            </div>
            <div class="link-wrap">
                <a href="{{ route('expertise.detail', $expertise->slug) }}" class="link-btn">Read More</a>
            </div>
        </div>
    </div>
</div>