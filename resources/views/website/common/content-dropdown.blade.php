<div class="list-group d-none d-lg-block scroll_to_bar_wrap">
    <div class="list-group-inner container">
        @foreach ($contentTabs as $tab)
            @if(!empty($tab->tab_heading))
                <a class="list-group-item list-group-item-action" href="#section-{{ $tab->id }}">{{ $tab->tab_heading }}</a>
            @endif
        @endforeach
    </div>
</div>