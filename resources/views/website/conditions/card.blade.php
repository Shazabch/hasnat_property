<div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-down" data-aos-duration="1500" data-aos-delay="100">
    <div class="speciality-item speciality-wrap">
        <div class="speciality-top">
            <img src="{{ $condition->image ? asset($condition->image) : asset('front/assets/img/11.jpg') }}" alt="{{ $condition->image_alt }}">
        </div>
        <div class="speciality-inner mb-0">
            <h3>{{ $condition->title }}</h3>
            <p>{{ $condition->short_description }}</p>
            <a href="{{ route('conditions.detail', $condition->slug) }}" class="btn sm stretched-link">Read More</a>
        </div>
    </div>
</div>