@php
    use App\Models\Video;

    $videos = Video::all();
@endphp
@if (isset($videos) && $videos->isNotEmpty())

    <div class="container">
        <div class="row mx-0">
            @foreach ($videos as $video)
                <div class="col-12 col-md-12 col-lg-12 mx-auto">
                    <div class="d-block w-full">
                        <video width="100%" controls>
                            <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
             
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
    <div class="col-12 col-md-12 col-lg-12 mx-auto">
        <div class="alert alert-warning text-center">
            No videos available at the moment.
        </div>
    </div>
@endif
