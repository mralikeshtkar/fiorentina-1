@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- CSRF Token for Laravel, ensures your form is secure -->

        <div class="row">
            <div class="gap-3 col-md-9">
                <div class="card mb-3">
                    <div class="card-body">
                        <!-- Existing Form Sections -->

                        <!-- Video Upload and Playback Section -->
                        <div class="row mb-3">
                            <label for="videoUpload" class="form-label">Upload videos:</label>
                            <input type="file" class="form-control" id="videoUpload" name="videos[]" accept="video/*" multiple>
                            <div class="row mx-0 mt-3" id="video-container">
                                <!-- Video previews will be injected here -->
                            </div>
                        </div>

                        <!-- Delay Selection Section -->
                        <div class="row mb-3">
                            <label for="delaySelect" class="form-label">Select Delay Between Plays (ms):</label>
                            <select class="form-select" id="delaySelect">
                                <option value="1">1 ms</option>
                                <option value="5">5 ms</option>
                                <option value="10">10 ms</option>
                                <option value="15">15 ms</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 gap-3 d-flex flex-column-reverse flex-md-column mb-md-0 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Publish</h4>
                    </div>
                    <div class="card-body">
                        <div class="btn-list">
                            <button class="btn btn-primary" type="submit" value="apply" name="submitter">Save</button>
                            <button class="btn" type="submit" name="submitter" value="save">Save & Exit</button>
                        </div>
                    </div>
                </div>
                <!-- Status Section -->
                <div class="card meta-boxes">
                    <div class="card-header">
                        <h4 class="card-title"><label for="status" class="form-label required">Status</label></h4>
                    </div>
                    <div class="card-body">
                        <select data-placeholder="Select an option" class="form-control form-select" required="required"
                                id="status" name="status" aria-required="true">
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('footer')
    <script>
        document.getElementById('videoUpload').addEventListener('change', function (e) {
            const input = e.target;
            const videoContainer = document.getElementById('video-container');
            videoContainer.innerHTML = ''; // Clear previous videos
            const files = input.files;

            for (let i = 0; i < files.length; i++) {
                const videoElement = document.createElement('video');
                videoElement.src = URL.createObjectURL(files[i]);
                videoElement.controls = true;
                videoElement.width = 320;
                videoElement.height = 240;
                videoElement.dataset.playNumber = i + 1;
                videoContainer.appendChild(videoElement);
            }
        });

        function playVideosSequentially(delayInMilliseconds) {
            const videos = document.querySelectorAll('#video-container video');
            let currentIndex = 0;

            function playNextVideo() {
                if (currentIndex < videos.length) {
                    const video = videos[currentIndex];
                    video.play();
                    currentIndex++;

                    video.onended = function () {
                        setTimeout(playNextVideo, delayInMilliseconds);
                    };
                }
            }

            playNextVideo();
        }

        // Trigger video sequence on some event, for example, after form submission
        document.querySelector('form').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent form submission for testing purposes
            const delay = parseInt(document.getElementById('delaySelect').value); // Get the selected delay
            playVideosSequentially(delay);
        });
    </script>
@endpush
