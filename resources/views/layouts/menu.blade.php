@php
    $menu = [
    [
        "name" => "Visit Websites",
        "icon" => "fas fa-globe",
        "permissions" => [],
        "route" => "home",
        "target" => "_blank"
    ],
    [
        "name" => "Dashboard",
        "icon" => "",
        "permissions" => [''],
        "is_section"=>"true",
    ],
    [
        "name" => "Dashboard",
        "icon" => "fas fa-meteor",
        "permissions" => [],
        "route" => "admin.dashboard"
    ],
    [
        "name" => "System Administration",
        "icon" => "",
        "permissions" => ['user-management','role-management'],
        "is_section"=>"true",
    ],
    [
        "name" => "Administrator Settings",
        "icon" => "fas fa-users-cog",
        "permissions" => ['user-management','role-management'],
        "route" => "admin.system",
        "submenu" => [
            [
                "name" => "Users Management",
                "icon" => "fas fa-users",
                "permissions" => ['user-management'],
                "route" => "admin.system.users"
            ],
            [
                "name" => "Role Management",
                "icon" => "fas fa-key",
                "permissions" => ['role-management'],
                "route" => "admin.system.roles"
            ],
        ]
    ],


    [
        "name" => "Property Management",
        "icon" => "",
        "permissions" => ['user-management','role-management'],
        "is_section"=>"true",
    ],[
        "name" => "Property Management",
        "icon" => "fas fa-users-cog",
        "permissions" => ['user-management','role-management'],
        "route" => "admin.system",
        "submenu" => [
            [
            "name" => "Properties",
            "icon" => "fas fa-building",
            "permissions" => [],
            "route" => "admin.properties.index"
            ],
            [
                "name" => "Specifications",
                "icon" => "far fa-id-card",
                "permissions" => [],
                "route" => "admin.specifications.index"
            ],
            [
                "name" => "Amenetise",
                "icon" => "far fa-id-card",
                "permissions" => [],
                "route" => "admin.amenetise.index"
            ],
        ]
    ],




    [
        "name" => "Content Management",
        "icon" => "",
        "permissions" => [''],
        "is_section"=>"true",
    ],



    [
    "name" => "Projects",
    "icon" => "fas fa-building",
    "permissions" => [],
    "route" => "admin.projects.index"
    ],
    [
    "name" => "Property Rates",
    "icon" => "fas fa-building",
    "permissions" => [],
    "route" => "admin.rates.index"
    ],
    [
        "name" => "Reviews",
        "icon" => "far fa-id-card",
        "permissions" => [],
        "route" => "admin.testimonials.index"
    ],
    [
        "name" => "Blogs",
        "icon" => "far fa-id-card",
        "permissions" => [],
        "route" => "admin.publications.index"
    ],


    [
        "name" => "Web pages",
        "icon" => "far fa-id-card",
        "permissions" => [],
        "route" => "admin.web-pages.index"
    ],
];

@endphp


<!--
[
        "name" => "Conditions",
        "icon" => "far fa-id-card",
        "permissions" => [],
        "route" => "admin.conditions.index"
    ],
    [
        "name" => "Expertise",
        "icon" => "far fa-id-card",
        "permissions" => [],
        "route" => "admin.expertise.index"
    ], -->



<ul class="menu-nav">
    @foreach ($menu as $menuItem)
        @if(isset($menuItem['is_section']))
            @if(empty($menuItem['permissions']) || auth()->user()->canany($menuItem['permissions']))
            <li class="menu-section ">
                <h4 class="menu-text">{{ $menuItem['name'] }}</h4>
                {{-- <i class="menu-icon ki ki-bold-more-hor icon-md"></i> --}}
                <span class="menu-icon {{ $menuItem['icon'] }}"></span>
            </li>
            @endif
        @elseif (isset($menuItem['submenu']))
            @if(empty($menuItem['permissions']) || auth()->user()->canany($menuItem['permissions']))
                <li class="menu-item menu-item-submenu {{ openByRoute($menuItem['route']) }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="menu-icon {{ $menuItem['icon'] }}"></span>
                        <span class="menu-text">{{ $menuItem['name'] }}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">{{ $menuItem['name'] }}</span>
                                </span>
                            </li>
                            @foreach ($menuItem['submenu'] as $subMenuItem)
                            @if(empty($subMenuItem['permissions']) || auth()->user()->canany($subMenuItem['permissions']))
                            <li class="menu-item {{ activeByRoute($subMenuItem['route']) }}" aria-haspopup="true">
                                <a href="{{ route($subMenuItem['route']) }}" {{ isset($subMenuItem['target']) ? 'target="_blank"' : '' }} slivewire:navigate class="menu-link">
                                    @if(isset($subMenuItem['icon']))
                                    <span class="svg-icon menu-icon {{ $subMenuItem['icon'] }}"></span>
                                    @else
                                    <i class="menu-bullet menu-bullet-line">
                                        <span></span>
                                    </i>
                                    @endif
                                    <span class="menu-text">{{ $subMenuItem['name'] }}</span>
                                </a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endif
        @else
        {{-- Single Menu Start --}}
        @if(empty($menuItem['permissions']) || auth()->user()->canany($menuItem['permissions']))
        <li class="menu-item {{ activeByRoute($menuItem['route']) }}" aria-haspopup="true">
            <a href="{{ route($menuItem['route'] , $menuItem['params'] ?? []) }}" {{ isset($menuItem['target']) ? 'target="_blank"' : '' }} slivewire:navigate class="menu-link">
                <span class="svg-icon menu-icon {{ $menuItem['icon'] }}"></span>
                <span class="menu-text">{{ $menuItem['name'] }}</span>
            </a>
        </li>
        @endif
        {{-- Single Menu End --}}
        @endif
    @endforeach

</ul>
