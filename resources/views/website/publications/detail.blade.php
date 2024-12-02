@extends('layouts.master')

@section('meta_title', $publication->meta_title)
@section('meta_description', $publication->meta_description)

@section('content')
@if ($publication && $publication->schema)
    @include('website.common.scheme', ['schema' => $publication->schema])
@endif
 <!-- Publication-Header -->
 <section class="home_banner p-0">
    <div id="themeSlider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ $publication->image ? asset($publication->image) : asset('front/assets/img/blog_detail_placeholder.webp') }}" class="home-banner-bg" alt="{{ $publication->image_alt }}">
                <div class="caption-head">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="content_box_wrapper">
                                        <h1>{{ $publication->title }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-detail-content bg-cream">
    <div class="container1650"> 
        <div class="row">
            <div class="col-lg-4 d-lg-block d-none">
              <nav id="" class="h-100 flex-column align-items-stretch">
                <nav class="nav nav-pills flex-column v-scrollspy">
                    @foreach ($publication->contentTabs as $tab)
                    @if(!empty($tab->tab_heading))
                    <a class="nav-link" href="#item-{{ $tab->id }}">{{ $tab->tab_heading }}</a>
                    @endif
                    @endforeach
                    @if($publication->topics->count())
                    <div class="tags-box">
                        <h5>Topics</h5> 
                        @foreach ($publication->topics as $topic)
                        <span>{{ $topic->name }}</span> 
                        @endforeach
                    </div>
                    @endif
                </nav>
              </nav>
            </div>
            <div class="col-lg-8">
              <div>
                @foreach ($publication->contentSections as $contentSection)
                <div class="content scrolling-active" id="item-{{ $contentSection->id }}">
                    @if($contentSection->title)
                    <h2>{{ $contentSection->title }}</h2>
                    @endif
                    {!! $contentSection->content !!}

                    @if($contentSection->image)
                    <img src="{{ asset($contentSection->image) }}" alt="{{ $contentSection->image_alt }}">
                    @endif
                </div>
                @endforeach
                {{-- <div class="content scrolling-active" id="item-1">
                    <p>This year, Black Friday falls on the 29th November with Cyber Monday following on the 2nd December. In this article, we:</p> 
                    <ul>
                        <li>
                            Review how sales revenues for brands and retailers are affected in the run-up to Black Friday and Cyber Monday and how that might feed through to 2024.
                        </li>
                        <li>
                            Explore which omnichannel consumer touchpoints brands can use to maximise sales.
                        </li> 
                        <li>
                            Forecast this year’s trends, ranging from who will spend the most to how consumers will pay for goods and services.
                        </li>
                    </ul>
                    <blockquote>
                        <i class="icofont-quote-left"></i>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio rem magni, dolorum aut vel nostrum quae, fugit necessitatibus eius perferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam eum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio rem magni, dolorum aut vel nostrum quae, fugit necessitatibus eius perferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam eum?
                    </blockquote>
                </div>
                <div class="content scrolling-active" id="item-2">
                    <h3>Revenues in the weeks up to Black Friday and Cyber Monday</h3>
                    <p>
                        Black Friday has been a game-changer for retailers. Ever since its emergence in the U.S. and its later spread around the world, retailers have been keen to extend Black Friday’s impact. First, Black Friday became a weekend tail-ended by Cyber Monday. Today, that weekend is the finishing line of a prolonged discounting period that now often stretches all the way back to the start of October.
                    </p>
                    <p>
                        This has somewhat diluted the uniqueness of Black Friday but retailers benefit from this longer sales cycle. Revenues are now higher in October as consumers begin shopping for bargains earlier, in anticipation of a discount. 
                        <a href="https://www.mckinsey.com/industries/retail/our-insights/us-holiday-shopping-2023-consumer-caution-and-retailer-resilience" target="_blank" rel="noreferrer noopener"><u>McKinsey data</u></a> 
                        found that 56% of consumers began holiday shopping in October 2023, up 50% from the previous year.
                    </p>
                    <p>
                        This gets more intense in November in the run up to Black Friday itself. For example, online retailer revenues in November 2022 were 304% higher than in October. Research from 
                        <a href="https://www.thedrum.com/opinion/2021/10/13/thought-luxury-brands-weren-t-good-fit-black-friday-think-again" target="_blank" rel="noreferrer noopener"><u>The Drum</u></a> 
                        in 2021 found that order volumes doubled in the week running up to Black Friday.
                    </p>
                    <p>
                        Luxury brands have, of course, traditionally treated Black Friday discounting differently to mass and mid-market brands. Instead of cutting prices, many prefer to offer exclusive experiences or time-limited offers to generate additional revenues.
                    </p>
                    <p>
                        However, recent economic trends are challenging this approach for some brands. Earnest Analytics credit card data from 2023 suggested that these consumers had reduced their spending on expensive items in response to tougher economic circumstances. In the first week of November 2023, there was a 21% fall in online and in-store luxury apparel sales compared to a drop of 8% in general apparel.&nbsp;
                    </p>
                    <img src="https://croud.com/site/assets/files/10725/ave-calvar-tuk2zojmcga-unsplash.1600x900.webp" alt="">
                    <p>
                        This decline may have prompted some luxury manufacturers and retailers to discount - in the 
                        <a href="https://www.harpersbazaar.com/fashion/trends/a45617905/black-friday-designer-deals-2023/" target="_blank" rel="noreferrer noopener"><u>2023 Black Friday period</u></a>, 
                        brands like SSENSE offered 50% discounts and Tory Burch 40% discounts.&nbsp;
                    </p>
                    <p>
                        The impact of these discounts appears to have been significant. Adobe Analytics found, as reported in 
                        <a href="https://www.fashiondive.com/news/early-holiday-2023-luxury-sales-slump-earnest/700737/" target="_blank" rel="noreferrer noopener"><u>Fashion Dive</u></a>, 
                        that online apparel sales jumped 136% year on year on Black Friday and 154% on the following two days. This suggests that shoppers were waiting for the larger discounts to appear before making a purchase.
                    </p>
                    <p>
                        Although wages 
                        <a href="https://www.bbc.co.uk/news/business-12196322#:~:text=Are%20wages%20keeping%20up%20with%20inflation?" target="_blank" rel="noreferrer noopener"><u>are going up faster than the falling</u></a> 
                        rate of inflation, aspirational consumers will probably still feel the pinch this year. For these consumers, discounting may be one approach to drive revenue and shift inventory.
                    </p>
                    <p>
                        However, for luxury brands wanting to maximise Black Friday revenues without discounting, research indicates that you'll do well by focusing more on the in-person experience more than online discounting.
                    </p>
                </div>
                <div class="content scrolling-active" id="item-3">
                    <h3>Omnichannel and consumer touchpoints for Black Friday 2024</h3>
                    <p>
                        Across both retail and online, the following strategies were successful in 2023 and may become more important this year:
                    </p>
                    <ul> 
                        <li style="list-style-type:disc;">
                            <strong>Omnichannel marketing campaigns:</strong> Reach customers across multiple touchpoints including print media, in-store promotions, social media, email and via your website. Create a cohesive look and narrative to let customers know what to expect in terms of any Black Friday offers and incentives you’ll provide.
                        </li> 
                        <li style="list-style-type:disc;"><strong>Limited-time offers:</strong>
                             Although we’ve seen that revenues jump particularly on Black Friday Weekend, consider launching limited-time promotions in the run-up as well. The offers you run could be flash sales on a particular range of pieces or hourly deals on limited-edition items or stock you wish to clear. This will generate excitement and trigger FOMO vibes among your target consumers.
                        </li>
                    </ul>
                </div>
                <div class="content scrolling-active" id="item-4">
                    <h2>Omnichannel and consumer touchpoints for Black Friday 2024</h2>
                    <p>
                        Across both retail and online, the following strategies were successful in 2023 and may become more important this year:
                    </p>
                    <h3>Omnichannel and consumer touchpoints for Black Friday 2024</h3>
                    <p>
                        Across both retail and online, the following strategies were successful in 2023 and may become more important this year:
                    </p>
                    <h4>Omnichannel and consumer touchpoints for Black Friday 2024</h4>
                    <p>
                        Across both retail and online, the following strategies were successful in 2023 and may become more important this year:
                    </p>
                    <h5>Omnichannel and consumer touchpoints for Black Friday 2024</h5>
                    <p>
                        Across both retail and online, the following strategies were successful in 2023 and may become more important this year:
                    </p>
                    <h6>Omnichannel and consumer touchpoints for Black Friday 2024</h6>
                    <p>
                        Across both retail and online, the following strategies were successful in 2023 and may become more important this year:
                    </p>
                </div> --}}
              </div>
            </div>
        </div>
    </div>
</section>
{{-- FAQS --}}
{{-- @include('website.common.faqs') --}}
<!-- Publications -->
<section class="blog-area py-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title no-after pt-0 ps-0">
                    <p class="after-circle text-thin after-circle mx-auto text-primary">Research and Insights</p>
                    <h2 class="text-center">Latest Publications</h2>
                    <p class="text-primary text-center">Explore a collection of our research and scholarly articles. Each publication reflects our commitment to advancing knowledge and contributing to the field.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="blogs-slider owl-carousel owl-theme">
                @foreach ($related_publications as $related_publication)
                <div class="item" data-aos="fade-down" data-aos-duration="2000" data-aos-delay="100"> 
                    @include('website.publications.card',['publication' => $related_publication])
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-12 mt-4 text-center">
            <a href="{{ route('publications') }}" class="button smaller mouse_go">View All</a>
        </div>
    </div>
</section>
@endsection