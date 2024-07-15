@if ($posts->isNotEmpty())
    <section class="section pt-50 pb-50"
        @if ($shortcode->background_color) style="background-color: rgb(93, 46, 142) !important;" @endif>
        @php
            $match = App\Models\Matches::where('status', 'TIMED')->orderBy('match_date', 'asc')->firstOrFail();
            $match->home_team = json_decode($match->home_team, true);
            $match->away_team = json_decode($match->away_team, true);
            $match->odds = json_decode($match->odds, true);
            if ($match->home_team['shortName'] == 'Fiorentina') {
                $match->venue = 'Artemio Franchi Stadium';
            }

        @endphp

        <div class="container mt-3 mb-3">
            <div class="row align-items-center upcoming-match">
                <!-- Match Date, Time, and Venue -->
                <div class="col-md-3">
                    <p>{{ ucwords(\Carbon\Carbon::parse($match->match_date)->locale('it')->timezone('Europe/Rome')->isoFormat('dddd D MMMM [ore] H:mm')," \t\r\n\f\v") }}
                    </p>
                    <p>{{ $match->venue }}</p>
                </div>

                <!-- Team Logos and Names -->
                <div class="col-md-6 text-center">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ $match->home_team['crest'] }}" alt="{{ $match->home_team['shortName'] }} Crest"
                                style="height: 30px; margin-bottom: 10px;">
                            <h5>{{ $match->home_team['shortName'] }}</h5>
                        </div>
                        <div class="col-6">
                            <img src="{{ $match->away_team['crest'] }}" alt="{{ $match->away_team['shortName'] }} Crest"
                                style="height: 30px; margin-bottom: 10px;">
                            <h5>{{ $match->away_team['shortName'] }}</h5>
                        </div>
                    </div>
                </div>

                <!-- Ticket Buttons -->
                <div class="col-md-3">
                    <div class="d-grid">
                        <a href="#" class="btn-sm btn-primary mb-2 fiorentina-btn" style="grid-area: none;">WATCH
                            NOW!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="post-group post-group--hero">
                @foreach ($posts as $post)
                    @if ($loop->first)
                        <div class="post-group__left">
                            <article class="post post__inside post__inside--feature">
                                <div class="post__thumbnail">
                                    {{ RvMedia::image($post->image, $post->name, 'featured', attributes: ['loading' => 'eager']) }}
                                    <a class="post__overlay" href="{{ $post->url }}"
                                        title="{{ $post->name }}"></a>
                                </div>
                                <header class="post__header">
                                    <h3 class="post__title text-truncate"><a
                                            href="{{ $post->url }}">{{ $post->name }}</a></h3>
                                    <div class="post__meta">
                                        {!! Theme::partial('blog.post-meta', compact('post')) !!}
                                    </div>
                                </header>
                            </article>
                        </div>
                        <div class="post-group__right">
                        @else
                            <div class="post-group__item">
                                <article class="post post__inside post__inside--feature post__inside--feature-small">
                                    <div class="post__thumbnail">
                                        {{ RvMedia::image($post->image, $post->name, 'medium', attributes: ['loading' => 'eager']) }}
                                        <a class="post__overlay" href="{{ $post->url }}"
                                            title="{{ $post->name }}"></a>
                                    </div>
                                    <header class="post__header">
                                        <h3 class="post__title text-truncate"><a
                                                href="{{ $post->url }}">{{ $post->name }}</a>
                                        </h3>
                                    </header>
                                </article>
                            </div>
                            @if ($loop->last)
                        </div>
                    @endif
                @endif
@endforeach
</div>
</div>
</section>
@endif
