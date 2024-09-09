<section class="section recent-posts pt-20 pb-20"
    @if ($shortcode->background_color) style="background-color: {{ $shortcode->background_color }} !important;" @endif>
    <div class="container bg-white">
        <div class="row">
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
                                <div class="col-md-12 col-sm-12 col-12">
                                    @foreach ($posts as $index => $post)
                                        <article class="post post__vertical post__vertical--single post-item"
                                            style="display: flex; align-items: center; margin-bottom: 5px; {{ $index >= 6 ? 'display: none;' : '' }}">
                                            <!-- Image on the left -->
                                            <div class="post__thumbnail" style="flex: 1.5; width: 48%;">
                                                {{ RvMedia::image($post->image, $post->name, 'large') }}
                                                <a class="post__overlay" href="{{ $post->url }}"
                                                    title="{{ $post->name }}"></a>
                                            </div>

                                            <!-- Content (Title and Description) on the right -->
                                            <div class="post__content-wrap" style="flex: 2.5; padding-left: 20px;">
                                                <header class="post__header">
                                                    <h4 class="post__title" style="margin: 0;">
                                                        <a href="{{ $post->url }}" title="{{ $post->name }}"
                                                            style="text-decoration: none; color: inherit;">{{ $post->name }}</a>
                                                    </h4>
                                                </header>
                                                <div class="post__content">
                                                    <p style="margin: 10px 0 0;">{{ $post->description }}</p>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach

                                    <!-- Load More Button -->
                                    @if (count($posts) > 6)
                                        <div style="text-align: center;">
                                            <button id="load-more"
                                                style="
                background: #fff;
                border: 2px solid #aaa;
                border-radius: 3px;
                display: inline-block;
                font-size: .8rem;
                font-weight: 600;
                letter-spacing: .02em;
                line-height: 1;
                margin-top: 20px;
                margin-bottom: 20px;
                padding: 15px 0;
                text-align: center;
                text-transform: uppercase;
                width: 88.4%;
                cursor: pointer;
                color: #441274; /* Violet text color */
                transition: border-color 0.3s ease;
            "
                                                onmouseover="this.style.borderColor='#441274';"
                                                onmouseout="this.style.borderColor='#aaa';">
                                                ALTRE NOTIZIE
                                            </button>
                                        </div>
                                    @endif
                                </div>
                                {{--                                        <div class="col-md-6 col-sm-6 col-12"> --}}
                                {{--                                            <article class="post post__vertical post__vertical--single"> --}}
                                {{--                                                <div class="post__thumbnail"> --}}
                                {{--                                                    {{ RvMedia::image($post->image, $post->name, 'medium') }} --}}
                                {{--                                                    <a class="post__overlay" href="{{ $post->url }}" --}}
                                {{--                                                        title="{{ $post->name }}"></a> --}}
                                {{--                                                </div> --}}
                                {{--                                                <div class="post__content-wrap"> --}}
                                {{--                                                    <header class="post__header"> --}}
                                {{--                                                        <h3 class="post__title"><a href="{{ $post->url }}" --}}
                                {{--                                                                title="{{ $post->name }}">{{ $post->name }}</a></h3> --}}
                                {{--                                                        <div class="post__meta"><span --}}
                                {{--                                                                class="created__month">{{ $post->created_at->translatedFormat('M') }}</span><span --}}
                                {{--                                                                class="created__date">{{ $post->created_at->translatedFormat('d') }}</span><span --}}
                                {{--                                                                class="created__year">{{ $post->created_at->translatedFormat('Y') }}</span> --}}
                                {{--                                                        </div> --}}
                                {{--                                                    </header> --}}
                                {{--                                                    <div class="post__content"> --}}
                                {{--                                                        <p data-number-line="4">{{ $post->description }}</p> --}}
                                {{--                                                    </div> --}}
                                {{--                                                </div> --}}
                                {{--                                            </article> --}}
                                {{--                                        </div> --}}
                                {{--                                        <div class="col-md-6 col-sm-6 col-12"> --}}
                                {{--                                        @else --}}
                                {{--                                            <article --}}
                                {{--                                                class="post post__horizontal post__horizontal--single mb-20 clearfix"> --}}
                                {{--                                                <div class="post__thumbnail"> --}}
                                {{--                                                    {{ RvMedia::image($post->image, $post->name, 'medium') }} --}}
                                {{--                                                    <a class="post__overlay" href="{{ $post->url }}" --}}
                                {{--                                                        title="{{ $post->name }}"></a> --}}
                                {{--                                                </div> --}}
                                {{--                                                <div class="post__content-wrap"> --}}
                                {{--                                                    <header class="post__header"> --}}
                                {{--                                                        <h3 class="post__title"><a href="{{ $post->url }}" --}}
                                {{--                                                                title="{{ $post->name }}">{{ $post->name }}</a> --}}
                                {{--                                                        </h3> --}}
                                {{--                                                        <div class="post__meta"><span --}}
                                {{--                                                                class="post__created-at">{{ Theme::formatDate($post->created_at) }}</span> --}}
                                {{--                                                        </div> --}}
                                {{--                                                    </header> --}}
                                {{--                                                </div> --}}
                                {{--                                            </article> --}}
                                {{--                                    @endif --}}
                                {{--                                    @if ($loop->last) --}}
                                {{--                            </div> --}}
                                {{--                            @endif --}}

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

                                    @foreach (App\Models\Standing::all() as $index => $standing)
                                        @php
                                            // Assign special styles or labels based on the position
                                            $rank = $index + 1;
                                            $labelClass = '';
                                            if ($rank <= 4) {
                                                $labelClass = 'badge badge-success'; // First place
                                            } elseif ($rank == 5) {
                                                $labelClass = 'badge badge-danger'; // Top 4
                                            } elseif ($rank == 6) {
                                                $labelClass = 'badge badge-warning'; // Top 6
                                            } elseif ($rank >= 18) {
                                                $labelClass = 'badge badge-danger'; // Top 6
                                            } else {
                                                $labelClass = 'text-dark'; // Top 6
                                            }
                                        @endphp

                                        <tr style="border-bottom:1px solid blueviolet">
                                            <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important" @endif
                                                style="border-right: 1px solid blueviolet;">
                                                <span class="{{ $labelClass }}">{{ $rank }}</span>
                                                <img src="{{ $standing->crest_url }}" width="15">
                                                {{ $standing->short_name }}
                                            </td>
                                            <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                                                style="border-right: 1px solid blueviolet;">
                                                {{ $standing->points }}
                                            </td>
                                            <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                                                style="border-right: 1px solid blueviolet;text-align:center">
                                                {{ $standing->played_games }}
                                            </td>
                                            <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                                                style="border-right: 1px solid blueviolet;text-align:center">
                                                {{ $standing->won }}
                                            </td>
                                            <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                                                style="border-right: 1px solid blueviolet;text-align:center">
                                                {{ $standing->draw }}
                                            </td>
                                            <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                                                style="border-right: 1px solid blueviolet;text-align:center">
                                                {{ $standing->lost }}
                                            </td>
                                            <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                                                style="text-align:center">{{ $standing->goal_difference }}
                                            </td>
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

{{-- @include('ads.includes.adsense', ['adClient' => 'ca-pub-6741446998584415', 'adSlot' => 'YYYYYYYYYY']) --}}
@include('ads.includes.adsense', ['adClient' => 'ca-pub-6741446998584415'])

<script>
    document.getElementById('load-more').addEventListener('click', function() {
        const hiddenArticles = document.querySelectorAll('article.post-item[style*="display: none;"]');

        hiddenArticles.forEach(article => {
            article.style.display = 'flex';
        });

        // Hide the Load More button after revealing all hidden articles
        this.style.display = 'none';
    });
</script>
