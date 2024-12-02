<div class="d-block d-lg-none sticky_dropdown">
    <select id="mobile-dropdown" class="form-select">
        @foreach ($contentTabs as $tab)
            @if(!empty($tab->tab_heading))
                <option value="#section-{{ $tab->id }}">{{ $tab->tab_heading }}</option>
            @endif
        @endforeach
    </select>
</div>