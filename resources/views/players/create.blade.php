@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    <form action="{{ route('players.store') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- CSRF Token for Laravel, ensures your form is secure -->

        <div class="row">
            <!-- Main Content Area -->
            <div class="gap-3 col-md-9">
                <!-- Player Name Input -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Player Name</h4>
                    </div>
                    <div class="card-body">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                </div>

                <!-- Player Image Upload -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title">Player Image</h4>
                    </div>
                    <div class="card-body">
                        <input type="file" class="form-control" id="imageUpload" name="image" required>
                        <img src="#" alt="Image Preview" class="image-preview mt-3" style="max-width: 200px; display: none;">
                    </div>
                </div>

                <!-- Vote Number Input -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title">Vote Number</h4>
                    </div>
                    <div class="card-body">
                        <input type="number" class="form-control" id="vote_number" name="vote_number" value="{{ old('vote_number') }}" required min="4" max="8">
                    </div>
                </div>
            </div>

            <!-- Sidebar Area -->
            <div class="col-md-3 gap-3 d-flex flex-column-reverse flex-md-column mb-md-0 mb-5">
                <!-- Publish Section -->
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
                                Save &amp; Exit
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Status Section -->
                <div class="card meta-boxes mt-3">
                    <div class="card-header">
                        <h4 class="card-title">
                            <label for="status" class="form-label required">Status</label>
                        </h4>
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
        document.getElementById('imageUpload').addEventListener('change', function (e) {
            const input = e.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.querySelector('.image-preview').setAttribute('src', e.target.result);
                    document.querySelector('.image-preview').style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
@endpush
