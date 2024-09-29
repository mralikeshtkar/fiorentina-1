<ul @class(['navbar-nav', $navbarClass ?? null])>
    @foreach (DashboardMenu::getAll() as $menu)
        @if ($menu['id'] == 'cms-core-plugins' || $menu['id'] == 'cms-core-system')
        @else
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
        <a href="{{ route('videos.index') }}" class="nav-link dropdown-toggle nav-priority-3000" id="ads"
            data-bs-auto-close="false" role="button" aria-expanded="false" title="Ads">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa fa-link"></i></span>
            <span class="nav-link-title  text-truncate">Videos</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a href="{{ route('ads.index') }}" class="nav-link dropdown-toggle nav-priority-3000" id="ads"
            data-bs-auto-close="false" role="button" aria-expanded="false" title="Ads">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa fa-link"></i></span>
            <span class="nav-link-title  text-truncate">Ads</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a href="{{ route('players.index') }}" class="nav-link dropdown-toggle nav-priority-3000" id="ads"
            data-bs-auto-close="false" role="button" aria-expanded="false" title="Ads">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa fa-link"></i></span>
            <span class="nav-link-title  text-truncate">I Giocatori</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle nav-priority-2000" href="#polls" id="polls" data-bs-toggle="dropdown"
            data-bs-auto-close="false" role="button" aria-expanded="false" title="Aspetto">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa fa-poll"></i></span>
            <span class="nav-link-title text-truncate">
                Polls
            </span>
        </a>
        <div class="dropdown-menu animate slideIn dropdown-menu-start">
            <a href="{{ route('polls.create') }}" class="dropdown-item nav-priority-1">
                <span class="nav-link-title text-truncate">
                    Crea
                </span>
            </a>
            <a href="{{ route('polls.index') }}" class="dropdown-item nav-priority-2">

                <span class="nav-link-title text-truncate">
                    View
                </span>
            </a>
        </div>

    </li>
</ul>
