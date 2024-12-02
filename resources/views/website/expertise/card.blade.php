<div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-down" data-aos-duration="1500" data-aos-delay="100">
    <div class="speciality-item speciality-wrap expertise-card">
        <div class="speciality-top">
            <img src="{{ $expertise->image ? asset($expertise->image) : asset('front/assets/img/11.jpg') }}" alt="{{ $expertise->image_alt }}">
        </div>
        <div class="speciality-inner mb-0">
            <h3>{{ $expertise->title }}</h3>
            <p>{{ $expertise->tagline }}</p>
            <a href="{{ route('expertise.detail', $expertise->slug) }}" class="btn sm stretched-link">Read More</a>
        </div>
    </div>
</div>