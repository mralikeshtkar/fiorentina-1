{{--<ul class="menu">--}}
{{--    @foreach (DashboardMenu::getAll('member') as $item)--}}

{{--        @continue(! $item['name'])--}}
{{--        <li>--}}
{{--            <a--}}
{{--                href="{{ $item['url']  }}"--}}
{{--                @class(['active' => $item['active'] && $item['url'] !== BaseHelper::getHomepageUrl()])--}}
{{--            >--}}
{{--                <x-core::icon :name="$item['icon']" />--}}
{{--                {{ __($item['name']) }}--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    @endforeach--}}
{{--</ul>--}}
{{--<ul class="menu " style="background-color: violet;">--}}
{{--<ul class="menu " >--}}

{{--    @foreach (DashboardMenu::getAll('member') as $item)--}}
{{--        @continue(! $item['name'] || $item['name'] === 'posts')--}}
{{--        <li>--}}
{{--            <a--}}
{{--                href="{{ $item['url']  }}"--}}
{{--                @class(['active' => $item['active'] && $item['url'] !== BaseHelper::getHomepageUrl()])--}}
{{--            >--}}
{{--                <x-core::icon :name="$item['icon']" />--}}
{{--                {{ __($item['name']) }}--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    @endforeach--}}
{{--</ul>--}}

<ul class="menu">
    @foreach (DashboardMenu::getAll('member') as $item)
        @continue(! $item['name']) <!-- This skips any items without a name -->

        <!-- Display the item name -->
        <li>{{ $item['name'] }}</li>

        <li>
            <a
                href="{{ $item['url']  }}"
                @class(['active' => $item['active'] && $item['url'] !== BaseHelper::getHomepageUrl()])
            >
                <x-core::icon :name="$item['icon']" />
                {{ __($item['name']) }}
            </a>
        </li>
    @endforeach
</ul>




