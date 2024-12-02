<div class="shadow-effect">
    <img class="img-circle" src="{{ $testimonial->image ? asset($testimonial->image) : asset('front/assets/avt.jpg') }}" alt="{{ $testimonial->name }}">
    <div class="testimonail-right">
        <div class="testimonial-name">
            <h5>{{ $testimonial->name }}</h5>
            <div class="rating-stars">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
        </div>
        <p class="testimonial-description">
            {!! $testimonial->description !!}
        </p>
    </div>
</div>
