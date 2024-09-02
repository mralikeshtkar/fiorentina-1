@php
    use Carbon\Carbon;
    $date = Carbon::parse($post->created_at);
    $formattedDate = $date->format('j F Y - H:i');

@endphp
<span class="created_at " style="color: gray;">
    {!! BaseHelper::renderIcon('ti ti-clock') !!} {{ $formattedDate }}
</span>


@if ($post->author->name)

    @if ($post->author->avatar->url)
        <img class="post-author" src="{{ $post->author->avatar->url }}" alt="$post->author->avatar->url">
    @else
        <span class="post-author " style="color: gray;">{!! BaseHelper::renderIcon('ti ti-user-circle') !!}
    @endif

    <span class="author-name">{{ $post->author->name }}</span>
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
