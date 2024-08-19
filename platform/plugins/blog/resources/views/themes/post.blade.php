 <div>
    <h3>{{ $post->name }}</h3>
    {!! Theme::breadcrumb()->render() !!}
</div>
<header>
    <h3>{{ $post->name }}</h3>
    <div>
        @if ($post->categories->isNotEmpty())
            <span>
                <a href="{{ $post->categories->first()->url }}">{{ $post->categories->first()->name }}</a>
            </span>
        @endif
        <span>{{ $post->created_at->format('M d, Y') }}</span>

        @if ($post->tags->isNotEmpty())
            <span>
                @foreach ($post->tags as $tag)
                    <a href="{{ $tag->url }}">{{ $tag->name }}</a>
                @endforeach
            </span>
        @endif
            <ul id="btn-share-custom" class="mvp-post-soc-list left relative">
                <a href="#" onclick="window.open('http://www.facebook.com/sharer.php?u=https://www.laviola.it/difensore-cercasi-valentini-subito-matip-e-sutalo-le-alternative/&amp;t=Difensore cercasi: Valentini subito, Matip e Sutalo le alternative', 'facebookShare', 'width=626,height=436'); return false;" title="Share on Facebook">
                    <li class="mvp-post-soc-fb">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    </li>
                </a>
                <a href="#" onclick="window.open('http://twitter.com/share?text=Difensore cercasi: Valentini subito, Matip e Sutalo le alternative -&amp;url=https://www.laviola.it/difensore-cercasi-valentini-subito-matip-e-sutalo-le-alternative/', 'twitterShare', 'width=626,height=436'); return false;" title="Tweet This Post">
                    <li class="mvp-post-soc-twit">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                    </li>
                </a>
                <a href="#" onclick="window.open('http://pinterest.com/pin/create/button/?url=https://www.laviola.it/difensore-cercasi-valentini-subito-matip-e-sutalo-le-alternative/&amp;media=https://www.laviola.it/wp-frntn/uploads/2024/07/IMG_4276-1000x600.jpeg&amp;description=Difensore cercasi: Valentini subito, Matip e Sutalo le alternative', 'pinterestShare', 'width=750,height=350'); return false;" title="Pin This Post">
                    <li class="mvp-post-soc-pin">
                        <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                    </li>
                </a>
                <a href="mailto:?subject=Difensore cercasi: Valentini subito, Matip e Sutalo le alternative&amp;BODY=I found this article interesting and thought of sharing it with you. Check it out: https://www.laviola.it/difensore-cercasi-valentini-subito-matip-e-sutalo-le-alternative/">
                    <li class="mvp-post-soc-email">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                    </li>
                </a>
                <a href="https://www.laviola.it/difensore-cercasi-valentini-subito-matip-e-sutalo-le-alternative/#comments">
                    <li class="mvp-post-soc-com mvp-com-click">
                        <i class="far fa-comment" aria-hidden="true"></i>
                    </li>
                </a>
            </ul>
    </div>
</header>
<div class='ck-content' style="background-color: green !important;">

{{--    {!! BaseHelper::clean($post->content) !!}--}}
{{--    @include('ads.includes.dblog-p1')--}}
</div>
<br />
{!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, null, $post) !!}

@php $relatedPosts = get_related_posts($post->getKey(), 2); @endphp

@if ($relatedPosts->isNotEmpty())
    <footer>
        @foreach ($relatedPosts as $relatedItem)
            <div>
                <article>
                    <div><a href="{{ $relatedItem->url }}"></a>
                        <img
                            src="{{ RvMedia::getImageUrl($relatedItem->image, null, false, RvMedia::getDefaultImage()) }}"
                            alt="{{ $relatedItem->name }}"
                        >
                    </div>
                    <header><a href="{{ $relatedItem->url }}"> {{ $relatedItem->name }}</a></header>
                </article>
            </div>
        @endforeach
    </footer>
@endif
