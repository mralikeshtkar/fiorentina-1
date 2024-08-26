@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    <form action="{{ route('players.store') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- CSRF Token for Laravel, ensures your form is secure -->

        <div class="row">
            <!-- Main Content Area -->
            <div class="gap-3 col-md-9">
                <!-- Player Name Input -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Player Name</h4>
                    </div>
                    <div class="card-body">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                </div>

                <!-- League Input -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h4 class="card-title">League</h4>
                    </div>
                    <div class="card-body">
                        <input type="text" class="form-control" id="league" name="league" value="{{ old('league') }}" required>
                    </div>
                </div>

                <!-- Position Input -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Position</h4>
                    </div>
                    <div class="card-body">
                        <input type="text" class="form-control" id="position" name="position" value="{{ old('position') }}" required>
                    </div>
                </div>

                <!-- Season Input -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Season</h4>
                    </div>
                    <div class="card-body">
                        <input type="text" class="form-control" id="season" name="season" value="{{ old('season') }}" required>
                    </div>
                </div>

                <!-- Player Image Upload -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Player Image</h4>
                    </div>
                    <div class="card-body">
                        <input type="file" class="form-control" id="imageUpload" name="image" required>
                        <img src="#" alt="Image Preview" class="image-preview mt-3" style="max-width: 200px; display: none;">
                    </div>
                </div>

                <!-- Flag ID Input -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Flag ID</h4>
                    </div>
                    <div class="card-body">
                        <input type="number" class="form-control" id="flag_id" name="flag_id" value="{{ old('flag_id') }}" required>
                    </div>
                </div>

                <!-- Jersey Number Input -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Jersey Number</h4>
                    </div>
                    <div class="card-body">
                        <input type="number" class="form-control" id="jersey_number" name="jersey_number" value="{{ old('jersey_number') }}" required>
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
                                Save
                            </button>
                            <button class="btn" type="submit" name="submitter" value="save">
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
