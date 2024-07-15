<ul @class(['navbar-nav', $navbarClass ?? null])>
    @foreach (DashboardMenu::getAll() as $menu)
        @include('core/base::layouts.partials.navbar-nav-item', [
            'menu' => $menu,
            'autoClose' => $autoClose,
            'isNav' => true,
        ])
    @endforeach
    <li class="nav-item">
        <a href="" class="nav-link">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa fa-link"></i></span>
            <span class="nav-link-title">Custom nav-item</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a href="" class="nav-link dropdown-toggle nav-priority-3000" href="#ads" id="ads"
            data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" title="Ads">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa fa-link"></i></span>
            <span class="nav-link-title  text-truncate">Ads</span>
        </a>
        <div class="dropdown-menu animate slideIn dropdown-menu-start">
            <a href="" class="dropdown-item nav-link-priority-1" id="ads-view">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa fa-circle-dot"></i></span>
                <span class="nav-link-title">View</span>
            </a>
            <a href="" class="dropdown-item nav-link-priority-2" id="ads-create">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa fa-circle-dot"></i></span>
                <span class="nav-link-title">Create</span>
            </a>
        </div>
    </li>
</ul>
