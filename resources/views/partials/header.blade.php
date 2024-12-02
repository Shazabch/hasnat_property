<!-- Start Navbar Area Desktop -->
<div class="navbar-area d-lg-block d-none">
    <div class="mobile-nav">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{asset('assets/media/bg/hasnat-logo.svg')}}" alt="Mr. Irfan Malik Logo">
        </a>
    </div>
    <div class="main-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{asset('assets/media/bg/hasnat-logo.svg')}}" alt="Mr. Irfan Malik Logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link mouse_go">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about-us') }}" class="nav-link mouse_go">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('properties') }}" class="nav-link mouse_go">Properties</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('publications') }}" class="nav-link mouse_go">Blogs</a>
                        </li>                                  
                        <li class="nav-item">
                            <a href="{{ route('contact-us') }}" class="nav-link mouse_go">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="header-right">
                    <div class="d-flex align-items-center">
                        <div class="d-inline me-3 mt-2">
                            <button class="button smaller button_secondary mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Book Appointment</button>
                        </div>
                        <div class="wc_call_us">
                            <a href="tel:{{ $phone1['label'] }}" class="mouse_go">
                                <span>Call us</span>
                                {{ $phone1['label'] }}
                            </a>
                                <img src="{{ asset('front/assets/img/phone-icon.svg') }}" alt="Contact Us">
                            </svg>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Start Navbar Area Mobile -->
<nav class="off_canvas-mbl navbar fixed-top d-lg-none d-block">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            {{-- <h3 class="text-secondary">Dr. Irfan Malik</h3> --}}
            <img src="{{asset('assets/media/bg/logo-white-gold-1.png')}}" alt="Mr. Irfan Malik Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a class="navbar-brand d-none" href="{{ route('home') }}">
                    <h3 class="text-secondary">Mr. Irfan Malik</h3>
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-lg-3">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link mouse_go">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about-us') }}" class="nav-link mouse_go">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('publications') }}" class="nav-link mouse_go">Publications</a>
                    </li>

                    <li class="drop_down">
                        <a class="dropdown_toggle nav-link mouse_go">
                            <span>Expertise</span>
                            <i class="fa-solid fa-chevron-down text-secondary"></i>
                        </a>
                        <ul class="dropdown_menu">
                            @foreach ($menu_expertises as $expertise_chunk)
                                @foreach ($expertise_chunk as $expertise)
                                    <li><a href="{{ route('expertise.detail', $expertise->slug) }}" class="mouse_go">{{ $expertise->title }}</a></li>
                                @endforeach
                            @endforeach
                            <a href="{{ route('expertise') }}" class="mouse_go btn">View All</a>
                        </ul>
                    </li>
                    
                                                      
                    <li class="drop_down">
                        <a class="dropdown_toggle nav-link mouse_go">
                            <span>Conditions</span>
                            <i class="fa-solid fa-chevron-down text-secondary"></i>
                        </a>
                        <ul class="dropdown_menu">
                            @foreach ($conditions_chunks as $condition_chunk)
                                @foreach ($condition_chunk as $condition)
                                    <li><a href="{{ route('conditions.detail', $condition->slug) }}" class="mouse_go">{{ $condition->title }}</a></li>
                                @endforeach
                            @endforeach
                            <a href="{{ route('conditions') }}" class="mouse_go btn">View All</a>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact-us') }}" class="nav-link mouse_go">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>