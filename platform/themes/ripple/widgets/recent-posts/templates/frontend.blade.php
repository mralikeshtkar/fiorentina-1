@php
    use Botble\Blog\Models\Post;
    use Illuminate\Support\Facades\DB;

    $mostCommentedPosts = DB::select("
    SELECT posts.*
    FROM posts
    JOIN (
        SELECT reference_id, COUNT(reference_id) as comment_count
        FROM fob_comments
        WHERE reference_type = 'Botble\\\\Blog\\\\Models\\\\Post'
        GROUP BY reference_id
        ORDER BY comment_count DESC
        LIMIT 5
    ) as most_commented
    ON posts.id = most_commented.reference_id;
");

    // If you need to convert the result into a collection of Post models, you can do this:
    $mostCommentedPosts = collect($mostCommentedPosts)->map(function ($post) {
        return (new \Botble\Blog\Models\Post())->newFromBuilder($post);
    });
@endphp
@if ($mostCommentedPosts->isNotEmpty())
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


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
