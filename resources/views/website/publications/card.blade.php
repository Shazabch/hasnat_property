<div class="box b-box"> 
    <a href="{{ route('publications.detail', $publication->slug) }}">
        <div href="{{ route('publications.detail', $publication->slug) }}" class="photo-link"> 
            <img alt="{{ $publication->image_alt }}" src="{{ $publication->image ? asset($publication->image) : asset('front/assets/img/blog_placeholder.webp') }}"> 
        </div> 
        <div class="details"> 
            <p class="sub">{{ $publication->type->name }}</p> 
            <a class="title" href="{{ route('publications.detail', $publication->slug) }}">{{ $publication->title }}</a> 
            <a class="button smaller button_secondary mb-0 stretched-link" href="{{ route('publications.detail', $publication->slug) }}">Read More</a> 
        </div>
    </a>
</div>