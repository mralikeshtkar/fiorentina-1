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
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}"
                                   required>
                        </div>

                        <!-- Video Upload Input (multiple) -->
                        <div class="mb-3">
                            <label for="videoUpload" class="form-label">Upload Videos</label>
                            <span data-bb-toggle="video-picker-choose"
                                  data-target="popup" class="btn btn-primary">
                                Choice videos
                            </span>
                            @error('videos')
                            <span class="is-invalid text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Video Previews -->
                        <div class="mb-3">
                            <label for="videoPreview" class="form-label">Video Previews</label>
                            <div id="videoPreviewContainer" class="row">
                                <!-- Video previews will be injected here -->
                            </div>
                        </div>

                        <!-- Delay Selection Section -->
                        <div class="mb-3">
                            <label for="delaySelect" class="form-label">Select Delay Between Plays (ms):</label>
                            <select class="form-select" id="delaySelect">
                                <option value="1">1 ms</option>
                                <option value="5">5 ms</option>
                                <option value="10">10 ms</option>
                                <option value="15">15 ms</option>
                            </select>
                        </div>

                        <!-- Video Mode Selection -->
                        <div class="mb-3">
                            <label for="mode" class="form-label">Playlist Mode</label>
                            <select class="form-control" id="mode" name="mode" required>
                                @foreach(\App\Models\Video::PLAYLIST_MODES as $mode)
                                    <option value="{{ $mode }}">{{ $mode }}</option>
                                @endforeach
                            </select>
                            @error('mode')
                            <span class="is-invalid text-danger">{{ $message }}</span>
                            @enderror
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
                                    <path
                                        d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
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
                        <select class="form-control form-select" required="required" id="status" name="status"
                                aria-required="true">
                            @foreach(\App\Models\Video::STATUSES as $status)
                                <option value="{{ $status }}">{{ $status }}</option>
                            @endforeach
                        </select>
                        @error('status')
                        <span class="is-invalid text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('footer')
    <script>
        // Keep track of the number of uploaded videos to set the correct options for ordering
        let totalVideos = 0;

        $.each($(document).find('[data-bb-toggle="video-picker-choose"][data-target="popup"]'), (function (e, t) {
            $(t).rvMedia({
                multiple: true,
                filter: "video",
                onSelectFiles: function (e, t) {
                    const container = $('#videoPreviewContainer');
                    totalVideos += e.length; // Add newly uploaded videos to total count

                    // Build select options based on the new total number of videos
                    let selectOptions = '';
                    for (let j = 1; j <= totalVideos; j++) {
                        selectOptions += `<option value="${j}">${j}</option>`;
                    }

                    // Append each selected video with the updated select box
                    e.forEach((i, k) => {
                        const html = `
                        <div class="col-12 col-md-6 col-lg-4 mb-3 video-preview-item">
                            <input type="hidden" name="videos[]" value="${i.id}">
                            <div class="w-100 p-2 border border-2 rounded-2">
                                <video src="${i.preview_url}" class="w-100" controls></video>
                                <div class="mt-1 order-select-wrapper">
                                    <label for="orderSelect-${i.id}">Select Order</label>
                                    <select name="order[${i.id}]" id="orderSelect-${i.id}" class="form-select">
                                        ${selectOptions}
                                    </select>
                                </div>
                                <button type="button" class="btn btn-danger video-preview-item-delete mt-2">
                                    Delete
                                </button>
                            </div>
                        </div>
                        `;
                        container.append(html);
                    });

                    // Update the order select options for all videos based on the new total count
                    updateAllOrderSelectBoxes(totalVideos);

                    // Check if playlist mode is Sequential and show/hide order select
                    toggleOrderSelect();
                }
            })
        }));

        // Function to update the order select options for all existing videos
        function updateAllOrderSelectBoxes(totalVideos) {
            const allSelectBoxes = document.querySelectorAll('#videoPreviewContainer select');
            allSelectBoxes.forEach((selectBox) => {
                let options = '';
                for (let j = 1; j <= totalVideos; j++) {
                    options += `<option value="${j}">${j}</option>`;
                }
                selectBox.innerHTML = options;
            });
        }

        // Show/hide the order select based on the playlist mode
        function toggleOrderSelect() {
            const mode = document.getElementById('mode').value;
            const orderSelectWrappers = document.querySelectorAll('.order-select-wrapper');

            orderSelectWrappers.forEach(wrapper => {
                if (mode === 'sequential') {
                    wrapper.style.display = 'block'; // Show order select
                } else {
                    wrapper.style.display = 'none'; // Hide order select
                }
            });
        }

        // Listen to playlist mode changes
        document.getElementById('mode').addEventListener('change', toggleOrderSelect);

        // Handle video deletion from the preview
        $(document).on('click', '.video-preview-item-delete', function (e) {
            e.preventDefault();
            $(e.target).closest('.video-preview-item').remove();
            totalVideos--; // Decrement total videos when one is deleted
            updateAllOrderSelectBoxes(totalVideos); // Update all select boxes after deletion

            // Re-check the visibility of the order select after deletion
            toggleOrderSelect();
        });

        // Initially hide the order select if needed when the page loads
        toggleOrderSelect();
    </script>
@endpush
