<span class="created_at " style="color: gray;">
    {!! BaseHelper::renderIcon('ti ti-clock') !!} {{ Theme::formatDate($post->created_at) }}
</span>

{{-- @if ($post->author->name) --}}
{{--    <span class="post-author text-light">{!! BaseHelper::renderIcon('ti ti-user-circle') !!} <span --}}
{{--            class="text-light">{{ $post->author->name }}</span></span> --}}
{{-- @endif --}}
@if ($post->author->name)
    @dd($post->author->avatar->url)
    <span class="post-author " style="color: gray;">{!! BaseHelper::renderIcon('ti ti-user-circle') !!}
        <span style="color: blueviolet;">{{ $post->author->name }}</span>
    </span>
@endif

<div class="row">
    @include('ads.includes.dblog-author')
</div>

<div>
    {{ RvMedia::image($post->image, $post->name, 'featured', attributes: ['loading' => 'eager']) }}
</div>
<div class="row">
    @include('ads.includes.dblog-title')
</div>
