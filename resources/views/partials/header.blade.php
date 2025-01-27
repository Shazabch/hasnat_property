<!-- Start Navbar Area Desktop -->
<div class="navbar-area d-lg-block d-none">
    <div class="mobile-nav">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{asset('assets/media/bg/hasnat-logo.svg')}}" alt="Mr.Hasnat Properties Logo">
        </a>
    </div>
    <div class="main-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{asset('assets/media/bg/hasnat-logo.svg')}}" alt="Mr.Hasnat Properties Logo">
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
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle mouse_go"
                                data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                Projects
                            </a>
                            <!-- Submenu -->
                            <ul class="dropdown-menu bg-dark">
                                @if(ourProjects()->count() > 0)
                                @foreach(ourProjects() as $project)
                                <li><a href="{{ route('projects', $project->slug) }}"
                                        class="dropdown-item">{{ $project->title }}</a>
                                </li>
                                @endforeach
                                @endif

                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle mouse_go"
                                data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                Property Rates
                            </a>
                            <!-- Submenu -->
                            <ul class="dropdown-menu bg-dark">
                                @if(ourPropertyRates()->count() > 0)
                                @foreach(ourPropertyRates() as $item)
                                <li><a href="{{ route('rates', $item->slug) }}"
                                        class="dropdown-item">{{ $item->title }}</a>
                                </li>
                                @endforeach
                                @endif

                            </ul>
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
                            <button class="button smaller button_secondary mb-0" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Book Appointment</button>
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
            {{-- <h3 class="text-secondary">Dr.Hasnat Properties</h3> --}}
            <img src="{{asset('assets/media/bg/hasnat-logo.svg')}}" alt="Mr.Hasnat Properties Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a class="navbar-brand d-none" href="{{ route('home') }}">
                    <h3 class="text-secondary">Mr.Hasnat Properties</h3>
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-lg-3">
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
        </div>
    </div>
</nav>