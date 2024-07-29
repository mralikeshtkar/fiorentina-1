@if ($post->first_category?->name)
    <span class="post-category" style="display: block;
    width: fit-content;
    margin-bottom: 10px;">
        {!! BaseHelper::renderIcon('ti ti-cube') !!}
        <a href="{{ $post->first_category->url }}">{{ $post->first_category->name }}</a>
    </span>
@endif

<span class="created_at text-light">
    {!! BaseHelper::renderIcon('ti ti-clock') !!} {{ Theme::formatDate($post->created_at) }}
</span>

{{--@if ($post->author->name)--}}
{{--    <span class="post-author text-light">{!! BaseHelper::renderIcon('ti ti-user-circle') !!} <span--}}
{{--            class="text-light">{{ $post->author->name }}</span></span>--}}
{{--@endif--}}
@if ($post->author->name)
    <span class="post-author text-light">{!! BaseHelper::renderIcon('ti ti-user-circle') !!}
        <span class="text-light" style="color: gray;">{{ $post->author->name }}</span>
    </span>
@endif

<div class="row">
    @include('ads.includes.blog-page')
</div>

<div>
    {{ RvMedia::image($post->image, $post->name, 'featured', attributes: ['loading' => 'eager']) }}
</div>
