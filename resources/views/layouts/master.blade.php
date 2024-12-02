<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
       <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
        
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/owl.theme.default.min.css') }}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/meanmenu.css') }}">
        <!-- Icofonts CSS -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/icofont.min.css') }}">
        <!-- Slick Slider CSS -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/slick.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/slick-theme.min.css') }}">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/magnific-popup.min.css') }}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/animate.min.css') }}">
        <!-- Odometer CSS -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/odometer.min.css') }}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}?v1.3.0">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/responsive.css') }}">
        <!-- Theme Dark CSS -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/theme-dark.css') }}">
        <!-- Custome CSS File-->
        <link rel="stylesheet" href="{{ asset('front/assets/css/main-style.css') }}?v5.8.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('front/assets/css/font-awesome-pro.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/magic-mouse.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>@yield('meta_title')</title>
        <meta name="description" content="@yield('meta_description')">
        <meta name="keywords" content="@yield('meta_keywords')">
        <link rel="icon" type="image/png" href="{{ asset('front/assets/img/favicon.png') }}">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="google-site-verification" content="Nu8YejORF8UIxAJaipcyD0geKFnrTijfoXYYCQqf15k" />
		@stack('styles')
        @livewireStyles
    
    </head>
    
    <body>

        <!-- Preloader -->
        {{-- <div class="loader">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="spinner">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
                </div>
            </div>
        </div> --}}
		@include('partials.header')

        @yield('content')
        
       

        <!-- Footer -->
        @include('partials.footer')

        <div class="call-buton">
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="cc-calto-action-ripple" href="tel:01935677007">
                <i class="fa-regular fa-calendar-check"></i>
            </button>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;">
                <div class="modal-content">
                    <div class="modal-body">
                       @livewire('appointment-form-component',['fromPage'=>url()->current()])
                    </div>
                </div>
            </div>
        </div>    

        <!-- Essential JS -->
        <script src="{{ asset('front/assets/js/jquery.min.js') }}"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> 
        <script src="{{ asset('front/assets/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Owl Carousel JS -->
        <script src="{{ asset('front/assets/js/owl.carousel.min.js') }}"></script>
        <!-- Meanmenu JS -->
        <script src="{{ asset('front/assets/js/jquery.meanmenu.js') }}"></script>
        <!-- Slider Slider JS -->
        <script src="{{ asset('front/assets/js/slick.min.js') }}"></script>
        <!-- Magnific Popup -->
        <script src="{{ asset('front/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Wow JS -->
        <script src="{{ asset('front/assets/js/wow.min.js') }}"></script>
        <!-- Form Ajaxchimp JS -->
		<script src="{{ asset('front/assets/js/jquery.ajaxchimp.min.js') }}"></script>
		<!-- Form Validator JS -->
		<script src="{{ asset('front/assets/js/form-validator.min.js') }}"></script>
		<!-- Contact JS -->
		<script src="{{ asset('front/assets/js/contact-form-script.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- Odometer JS -->
        <script src="{{ asset('front/assets/js/odometer.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/jquery.appear.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/magic_mouse.js') }}"></script>

        <!-- Custom JS -->
        <script src="{{ asset('front/assets/js/custom.js') }}"></script>

		@stack('scripts')

        @livewireScripts
         <!-- Schemas -->
         @stack('schemas')
         <script>
            $(document).ready(function() {
                $('.testimonials .testimonial-description, .reviews-listing .testimonial-description').each(function() { 
                    const $this = $(this);
                    const fullText = $this.html();
                    const words = fullText.split(' ');

                    // Determine the word limit based on the parent class
                    const wordLimit = $this.closest('.reviews-listing').length ? 60 : 30;

                    // Check if text exceeds the word limit
                    if (words.length > wordLimit) {
                        const truncatedText = words.slice(0, wordLimit).join(' ') + '... ';
                        $this.html(truncatedText + '<a href="javascript:void(0);" class="read-more">Read More</a>');

                        // Attach click event for Read More/Less functionality
                        $this.on('click', '.read-more', function() {
                            const isTruncated = $this.text().endsWith('... Read More');
                            const isReviewsListing = $this.closest('.reviews-listing').length > 0;

                            // Toggle text and link
                            if (isTruncated) {
                                // If it's in reviews-listing, expand without showing "Read Less"
                                if (isReviewsListing) {
                                    $this.html(fullText);
                                } else {
                                    // For testimonials, show "Read Less" option
                                    $this.html(fullText + ' <a href="javascript:void(0);" class="read-more">Read Less</a>');
                                }
                            } else {
                                // Revert back to truncated text
                                $this.html(truncatedText + '<a href="javascript:void(0);" class="read-more">Read More</a>');
                            }
                        });
                    }
                });
            });
        </script>        
    </body>
</html>