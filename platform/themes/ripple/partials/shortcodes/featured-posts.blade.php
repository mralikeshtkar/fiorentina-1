@if ($posts->isNotEmpty())

    <section class="section hero-section pt-45 pb-20"
        @if ($shortcode->background_color) style="background-color: #441274 !important;" @endif>



        <div class="container">
            <div class="row">
                <!-- Main content column (col-9) -->
                <div class="col-md-9">
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
                                            <h3 class="post__title text-truncate">
                                                <a href="{{ $post->url }}">{{ $post->name }}</a>
                                            </h3>
                                        </header>
                                    </article>
                                </div>
                                <div class="post-group__right">
                                @else
                                    <div class="post-group__item">
                                        <article
                                            class="post post__inside post__inside--feature post__inside--feature-small">
                                            <div class="post__thumbnail">
                                                {{ RvMedia::image($post->image, $post->name, 'medium', attributes: ['loading' => 'eager']) }}
                                                <a class="post__overlay" href="{{ $post->url }}"
                                                    title="{{ $post->name }}"></a>
                                            </div>
                                            <header class="post__header">
                                                <h3 class="post__title text-truncate">
                                                    <a href="{{ $post->url }}">{{ $post->name }}</a>
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

<!-- Black box column (col-3) similar to the image -->
<div class="col-md-3">
    <div class="black-box">
        @foreach ($posts as $post)
            @if ($loop->first)
                <div class="post-group__left">
                    <article class="post post__inside post__inside--feature">

                        <header class="post__header">
                            <h6 style="color: grey; font-size: 10px; margin-bottom: 5px;">NOTIZIE</h6>
                            <h6 class="post__title text-truncate">
                                <a href="{{ $post->url }}">{{ $post->name }}</a>
                            </h6>
                        </header>
                    </article>
                </div>
                <div class="post-group__right">
                @else
                    <div class="post-group__item">
                        <article class="post post__inside post__inside--feature post__inside--feature-small">

                            <header class="post__header">
                                <h6 style="color: grey; font-size: 10px; margin-bottom: 5px;">NOTIZIE</h6>
                                <h6 class="post__title text-truncate">
                                    <a href="{{ $post->url }}">{{ $post->name }}</a>
                                </h6>
                            </header>
                        </article>
                    </div>
                    @if ($loop->last)
                </div>
            @endif
        @endif
        @endforeach
        {{--                        <h6 style="color: grey; font-size: 10px; margin-bottom: 5px;">NOTIZIE</h6> --}}
        {{--                        <p style="font-size: 14px;color: white;  margin-bottom: 20px;">Fiorentina, il programma di oggi</p> --}}

        {{--                        <h6 style="color: grey; font-size: 10px; margin-bottom: 5px;">NOTIZIE</h6> --}}
        {{--                        <p style="font-size: 14px;color: white;  margin-bottom: 20px;">Mutu: "Gud? Ho solo pensieri positivi, ma quando hai la 10 devi sempre dimostrare qualcosa in più"</p> --}}

        {{--                        <h6 style="color: grey; font-size: 10px; margin-bottom: 5px;">NOTIZIE</h6> --}}
        {{--                        <p style="font-size: 14px;color: white; margin-bottom: 20px;">Palladino (sala stampa): "Kean come un leone, De Gea è stato un fenomeno"</p> --}}

        {{--                        <h6 style="color: grey; font-size: 10px; margin-bottom: 5px;">NOTIZIE</h6> --}}
        {{--                        <p style="font-size: 14px;color: white; ">Commisso: "È stato un weekend perfetto. Domani parto, torno a gennaio"</p> --}}
    </div>
</div>
</div>
</div>


</section>
@endif
