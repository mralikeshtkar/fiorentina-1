<ul @class(['navbar-nav', $navbarClass ?? null])>
    @dd(DashboardMenu::getAll())
    @foreach (DashboardMenu::getAll() as $menu)
        @if ($menu['id'] != 'cms-core-plugins')
            @include('core/base::layouts.partials.navbar-nav-item', [
                'menu' => $menu,
                'autoClose' => $autoClose,
                'isNav' => true,
            ])
        @endif
    @endforeach
    <li class="nav-item">
        <a href="" class="nav-link">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa fa-link"></i></span>
            <span class="nav-link-title">Custom nav-item</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a href="{{ route('ads.index') }}" class="nav-link dropdown-toggle nav-priority-3000" id="ads"
            data-bs-auto-close="false" role="button" aria-expanded="false" title="Ads">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa fa-link"></i></span>
            <span class="nav-link-title  text-truncate">Ads</span>
        </a>
    </li>
</ul>
