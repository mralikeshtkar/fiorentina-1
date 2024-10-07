@include('ads.includes.calendario')

@php
    $lastRecentPosts = Botble\Blog\Models\Post::orderBy('created_at', 'desc')->take(4)->get();
    dd($lastRecentPosts);
@endphp
