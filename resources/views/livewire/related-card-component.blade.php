<div>
    <section class="bg-dark2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title no-after pt-0 ps-0">
                        <p class="after-circle text-thin after-circle mx-auto text-white">Research and Market Insights
                        </p>
                        <h2 class="text-center text-secondary">Similar Listings</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($properties as $property)
                <div class="col-lg-4">
                    <div class="product-custom">
                        <div class="profile-widget">
                            <div class="doc-img">
                                @if ($property->main_image)
                                <a href="{{route('properties-detail', $property->id)}}" class="property-img mouse_go">
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
                                    </div>
                                </div>
                            </div>
                            <div class="pro-content">
                                <h3 class="title">
                                    <a href="{{route('properties-detail', $property->id)}}" tabindex="-1" class="mouse_go">{{ $property->title }}</a>
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
                @endforeach

            </div>
        </div>
    </section>
</div>
