@php
    use Botble\Blog\Models\Post;
    $mostCommentedPosts = Post::withCount('comments')->orderBy('comments_count', 'desc')->limit(5)->get();
@endphp
@if ($posts->isNotEmpty())

    <div class="widget widget__recent-post">
        <ul class="nav nav-tabs" id="postTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="recent-posts-tab" data-toggle="tab" href="#recent-posts" role="tab"
                    aria-controls="recent-posts" aria-selected="true">I PIÙ RECENTI</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="most-commented-tab" data-toggle="tab" href="#most-commented" role="tab"
                    aria-controls="most-commented" aria-selected="false">I PIÙ COMMENTATI</a>
            </li>
        </ul>
        <div class="tab-content" id="postTabsContent">
            <div class="tab-pane fade show active" id="recent-posts" role="tabpanel" aria-labelledby="recent-posts-tab">
                <div class="widget__content">
                    <ul>
                        @foreach ($posts as $post)
                            <li>
                                <article class="post post__widget clearfix">
                                    <div class="post__thumbnail">
                                        {{ RvMedia::image($post->image, $post->name, 'thumb') }}
                                        <a href="{{ $post->url }}" title="{{ $post->name }}"
                                            class="post__overlay"></a>
                                    </div>
                                    <header class="post__header">
                                        <h4 class="post__title text-truncate-2"><a href="{{ $post->url }}"
                                                title="{{ $post->name }}" data-number-line="2">{{ $post->name }}</a>
                                        </h4>
                                        <div class="post__meta"><span
                                                class="post__created-at">{{ Theme::formatDate($post->created_at) }}</span>
                                        </div>
                                    </header>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tab-pane fade" id="most-commented" role="tabpanel" aria-labelledby="most-commented-tab">
                <div class="widget__content">
                    <ul>
                        @foreach ($mostCommentedPosts as $post)
                            <li>
                                <article class="post post__widget clearfix">
                                    <div class="post__thumbnail">
                                        {{ RvMedia::image($post->image, $post->name, 'thumb') }}
                                        <a href="{{ $post->url }}" title="{{ $post->name }}"
                                            class="post__overlay"></a>
                                    </div>
                                    <header class="post__header">
                                        <h4 class="post__title text-truncate-2"><a href="{{ $post->url }}"
                                                title="{{ $post->name }}"
                                                data-number-line="2">{{ $post->name }}</a></h4>
                                        <div class="post__meta"><span
                                                class="post__created-at">{{ Theme::formatDate($post->created_at) }}</span>
                                        </div>
                                    </header>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
