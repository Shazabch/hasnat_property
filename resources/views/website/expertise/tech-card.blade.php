<div class="col-lg-3 mb-4">
    <div class="qualification-award" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
        <div class="qualification-front">
            <div class="award-img">
                <img src="{{ asset($tech['icon']) }}" alt="{{ $tech['title'] }}" class="award-image">
            </div>
            <div class="award-wrap">
                <h3 class="award-title text-center">{{ $tech['title'] }}</h3>
                <p class="award-description">{{ $tech['description'] }}</p>
            </div>
            <h3 class="counter">{{ str_pad($tech_no, 2, '0', STR_PAD_LEFT) }}</h3>
        </div>
        <div class="qualification-back">
            <div class="card_back-content">
                <ul>
                    @foreach ($tech['items'] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>