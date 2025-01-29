<div class="col-lg-4">
    <div class="product-custom">
        <div class="profile-widget">
            <div class="doc-img">
                @if ($property->main_image)
                    <a href="{{ route('properties-detail', $property->id) }}" class="property-img mouse_go">
                        <img src="{{ asset($property->main_image) }}" alt="Property Image"
                            style=" height: 320px; width: 480px">
                    </a>
                @else
                    <span class="text-muted">No Image</span>
                @endif

                <div class="product-amount">
                    <span>{{ $property->price }}</span>
                </div>
                <div class="feature-rating">
                    <div>
                        <div class="featured">
                            @if ($property->featured)
                                <span>Featured</span>
                            @endif

                        </div>
                        <div class="featured">
                            @if ($property->type)
                                <span> {{ $property->type === 'sale' ? 'For Sale' : 'To Rent' }}</span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="pro-content">
                <h3 class="title">
                    <a href="{{ route('properties-detail', $property->id) }}" tabindex="-1"
                        class="mouse_go">{{ $property->title }}</a>
                </h3>
                <p><i class="feather-map-pin"></i> {{ $property->adress }}</p>
                <ul class="property-category d-flex justify-content-between mb-0">
                    <li>
                        <span class="list">Listed on : </span>
                        <span class="date">{{ $property->created_at->format('d-M-Y h:i a') }}</span>
                    </li>
                    <li>
                        <span class="category list">Category : </span>
                        <span class="category-value date">{{ $property->categories }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
