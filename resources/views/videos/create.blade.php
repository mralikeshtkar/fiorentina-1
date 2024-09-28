@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- CSRF Token for Laravel, ensures your form is secure -->

        <div class="row">
            <div class="gap-3 col-md-9">
                <div class="card mb-3">
                    <div class="card-body">
                        <!-- Title Input -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Advertisement Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
                        </div>

                        <!-- Video Upload Input (multiple) -->
                        <div class="mb-3">
                            <label for="videoUpload" class="form-label">Upload Videos</label>
                            <input type="file" class="form-control" id="videoUpload" name="videos[]" accept="video/*" multiple required>
                        </div>

                        <!-- Video Previews -->
                        <div class="mb-3">
                            <label for="videoPreview" class="form-label">Video Previews</label>
                            <div id="videoPreviewContainer" class="d-flex flex-wrap">
                                <!-- Video previews will be dynamically added here -->
                            </div>
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
                            <button class="btn btn-primary" type="submit" value="apply" name="submitter">
                                <svg class="icon icon-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M14 4l0 4l-6 0l0 -4"></path>
                                </svg>
                                Save
                            </button>

                            <button class="btn" type="submit" name="submitter" value="save">
                                <svg class="icon icon-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 18v3h16v-14l-8 -4l-8 4v3"></path>
                                    <path d="M4 14h9"></path>
                                    <path d="M10 11l3 3l-3 3"></path>
                                </svg>
                                Save & Exit
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card meta-boxes">
                    <div class="card-header">
                        <h4 class="card-title">
                            <label for="status" class="form-label required">Status</label>
                        </h4>
                    </div>

                    <div class="card-body">
                        <select class="form-control form-select" required="required" id="status" name="status" aria-required="true">
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
        // Multiple Video Preview functionality
        document.getElementById('videoUpload').addEventListener('change', function (e) {
            const input = e.target;
            const videoPreviewContainer = document.getElementById('videoPreviewContainer');
            videoPreviewContainer.innerHTML = ''; // Clear previous previews

            if (input.files) {
                Array.from(input.files).forEach(file => {
                    const videoPreview = document.createElement('video');
                    videoPreview.width = 320;
                    videoPreview.height = 240;
                    videoPreview.controls = true;

                    const videoSource = document.createElement('source');
                    videoSource.src = URL.createObjectURL(file);
                    videoSource.type = 'video/mp4';

                    videoPreview.appendChild(videoSource);
                    videoPreviewContainer.appendChild(videoPreview);
                });
            }
        });
    </script>
@endpush
