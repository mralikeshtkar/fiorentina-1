<section class="section recent-posts pt-20 pb-20"
    @if ($shortcode->background_color) style="background-color: {{ $shortcode->background_color }} !important;" @endif>
    <div class="container bg-white">
        <div class="row" >
            @php
                $topSidebarContent = $withSidebar ? dynamic_sidebar('top_sidebar') : null;
            @endphp
            <div @class([
                'col-lg-9' => $topSidebarContent,
                'col-12' => !$topSidebarContent,
            ])>
                <div class="page-content">
                    <div class="post-group post-group--single">
                        <div class="post-group__header">
                            <h3 class="post-group__title">ULTIME NOTIZIE</h3>
                        </div>
                        <div class="post-group__content">
                            <div class="row">
                                <div class="col-md-9 col-sm-9 col-12">
                                @foreach ($posts as $post)

                                                <article class="post post__vertical post__vertical--single" style="display: flex; align-items: center; margin-bottom: -67px;">
                                                <!-- Image on the left -->
                                                <div class="post__thumbnail" style="flex: 1;">
                                                    {{ RvMedia::image($post->image, $post->name, 'large') }}
                                                    <a class="post__overlay" href="{{ $post->url }}" title="{{ $post->name }}"></a>
                                                </div>

                                                <!-- Content (Title and Description) on the right -->
                                                <div class="post__content-wrap" style="flex: 2; padding-left: 20px;">
                                                    <header class="post__header">
                                                        <h4 class="post__title">
                                                            <a href="{{ $post->url }}" title="{{ $post->name }}">{{ $post->name }}</a>
                                                        </h4>
                                                    </header>
                                                    <div class="post__content">
                                                        <p data-number-line="4">{{ $post->description }}</p>
                                                    </div>
                                                </div>
                                            </article>

                                @endforeach
                                </div>
{{--                                        <div class="col-md-6 col-sm-6 col-12">--}}
{{--                                            <article class="post post__vertical post__vertical--single">--}}
{{--                                                <div class="post__thumbnail">--}}
{{--                                                    {{ RvMedia::image($post->image, $post->name, 'medium') }}--}}
{{--                                                    <a class="post__overlay" href="{{ $post->url }}"--}}
{{--                                                        title="{{ $post->name }}"></a>--}}
{{--                                                </div>--}}
{{--                                                <div class="post__content-wrap">--}}
{{--                                                    <header class="post__header">--}}
{{--                                                        <h3 class="post__title"><a href="{{ $post->url }}"--}}
{{--                                                                title="{{ $post->name }}">{{ $post->name }}</a></h3>--}}
{{--                                                        <div class="post__meta"><span--}}
{{--                                                                class="created__month">{{ $post->created_at->translatedFormat('M') }}</span><span--}}
{{--                                                                class="created__date">{{ $post->created_at->translatedFormat('d') }}</span><span--}}
{{--                                                                class="created__year">{{ $post->created_at->translatedFormat('Y') }}</span>--}}
{{--                                                        </div>--}}
{{--                                                    </header>--}}
{{--                                                    <div class="post__content">--}}
{{--                                                        <p data-number-line="4">{{ $post->description }}</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </article>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6 col-sm-6 col-12">--}}
{{--                                        @else--}}
{{--                                            <article--}}
{{--                                                class="post post__horizontal post__horizontal--single mb-20 clearfix">--}}
{{--                                                <div class="post__thumbnail">--}}
{{--                                                    {{ RvMedia::image($post->image, $post->name, 'medium') }}--}}
{{--                                                    <a class="post__overlay" href="{{ $post->url }}"--}}
{{--                                                        title="{{ $post->name }}"></a>--}}
{{--                                                </div>--}}
{{--                                                <div class="post__content-wrap">--}}
{{--                                                    <header class="post__header">--}}
{{--                                                        <h3 class="post__title"><a href="{{ $post->url }}"--}}
{{--                                                                title="{{ $post->name }}">{{ $post->name }}</a>--}}
{{--                                                        </h3>--}}
{{--                                                        <div class="post__meta"><span--}}
{{--                                                                class="post__created-at">{{ Theme::formatDate($post->created_at) }}</span>--}}
{{--                                                        </div>--}}
{{--                                                    </header>--}}
{{--                                                </div>--}}
{{--                                            </article>--}}
{{--                                    @endif--}}
{{--                                    @if ($loop->last)--}}
{{--                            </div>--}}
{{--                            @endif--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($topSidebarContent)
            <div class="col-lg-3">

                <div class="page-sidebar mt-3">
                    <section>
                        <div class="page-content">
                            <div class="post-group">
                                <div class="post-group__header">
                                    <h3 class="post-group__title">CLASSIFICA SERIE A</h3>
                                </div>
                            </div>
                        </div>


                        <div>
                            @php
                                $updateMessage = App\Http\Controllers\StandingController::fetchStandingsIfNeeded();
                                $updateScheduledMessage = App\Http\Controllers\StandingController::fetchScheduledMatches();
                            @endphp
                        </div>
                        <table class="table table-sm table-striped">
                            <thead
                                style="
                            background: blueviolet;
                            border: 1px solid white;
                            color: white;
                            font-weight: 900;
                        ">
                                <tr>
                                    <th style="border-right: 1px solid white;"></th>
                                    <th style="border-right: 1px solid white;">PT</th>
                                    <th style="border-right: 1px solid white;">G</th>
                                    <th style="border-right: 1px solid white;">V</th>
                                    <th style="border-right: 1px solid white;">N</th>
                                    <th style="border-right: 1px solid white;">P</th>
                                    <th>DR</th>
                                </tr>
                            </thead>
                            <tbody
                                style="
                            background: white;
                            border: 1px solid white;
                        ">

                                @foreach (App\Models\Standing::all() as $standing)
                                    <tr style="border-bottom:1px solid blueviolet">
                                        <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;" @endif
                                            style="border-right: 1px solid blueviolet;"><img
                                                src="{{ $standing->crest_url }}" width="15">
                                            {{ $standing->short_name }}</td>
                                        <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                                            style="border-right: 1px solid blueviolet;">{{ $standing->points }}</td>
                                        <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                                            style="border-right: 1px solid blueviolet;text-align:center">
                                            {{ $standing->played_games }}
                                        </td>
                                        <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                                            style="border-right: 1px solid blueviolet;text-align:center">
                                            {{ $standing->won }}</td>
                                        <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                                            style="border-right: 1px solid blueviolet;text-align:center">
                                            {{ $standing->draw }}</td>
                                        <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                                            style="border-right: 1px solid blueviolet;text-align:center">
                                            {{ $standing->lost }}</td>
                                        <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                                            style="text-align:center">{{ $standing->goal_difference }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        @endif
    </div>
    </div>
</section>
