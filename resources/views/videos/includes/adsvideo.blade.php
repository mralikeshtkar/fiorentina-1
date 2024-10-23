@if (isset($video_urls) && $video_urls->count())

    <div class="container">
        <div class="row mx-0">
            <div class="col-12 mx-auto">
                <div class="d-block w-full">
                    <video width="100%" id="ads-video" autoplay muted data-url="{{ json_encode($video_urls) }}">
                        <source src="{{ $video_urls[0] }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="col-12 col-md-12 col-lg-12 mx-auto">
        <div class="alert alert-warning text-center">
            No videos available at the moment.
        </div>
    </div>
@endif
<ins class="adsbygoogle" style="display:block" data-ad-slot="170525737" data-ad-format="auto"
     data-full-width-responsive="true"></ins>

<script>
    const video = document.getElementById('ads-video');
    const urls = JSON.parse(video.getAttribute('data-url'));
    let activeVideo = 0;
    let delay = 30000; // Set default delay to 30 seconds (30000 milliseconds)

    const delayElement = document.getElementById('delay');

    // Check if the delay dropdown exists and update the delay dynamically
    if (delayElement) {
        delay = parseInt(delayElement.value) * 1000; // Get initial delay from dropdown (if present)

        // Update the delay when the user changes the selection
        delayElement.addEventListener('change', function() {
            delay = parseInt(this.value) * 1000; // Convert selected delay to milliseconds
        });
    }

    video.addEventListener('ended', function(e) {
        activeVideo = (++activeVideo) % urls.length; // Move to the next video
        setTimeout(function() {
            video.src = urls[activeVideo]; // Update video source to the next video
            video.play(); // Play the next video after the delay
        }, delay); // Use the selected delay before the next video starts
    });
</script>
