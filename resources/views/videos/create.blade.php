@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    {{--    <form action="{{ route('ad.submit') }}" method="POST" enctype="multipart/form-data">--}}
    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf <!-- CSRF Token for Laravel, ensures your form is secure -->


        <div class="row">

            <div class="gap-3 col-md-9">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="metabox-holder columns-2" id="post-body">
                            <!-- Title Section -->
                            <div class="post-body-content">
                                <div class="mb-3" id="titlediv">
                                    <label for="title" class="form-label" id="title-prompt-text">Aggiungi titolo</label>
                                    <input type="text" class="form-control" name="post_title" id="title"
                                           value="{{ old('post_title') }}" spellcheck="true" autocomplete="off">
                                </div>
                            </div>

                            <!-- Publish Section -->
                            <div class="postbox-container" id="postbox-container-1">
                                <div class="meta-box-sortables ui-sortable" id="side-sortables">
                                    <div class="postbox" id="submitdiv">
                                        <div class="postbox-header">
                                            <h2 class="hndle ui-sortable-handle">Pubblica</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- video Upload Section -->
                            <div class="row mb-3">
                                <label for="imageUpload" class="form-label">Aggiungi Video:</label>
                                <input type="file" class="form-control" id="imageUpload" name="image" accept="image/*">
                                <div class="row mx-0 mt-3">
                                    <div class="col-12">
                                        <img src="" class="image-preview" alt="">
                                    </div>
                                </div>
                            </div>

                            <!-- Ad Parameters Section -->
                            <div class="image-box image-box-image" action="select-image">
                                <input class="image-data" name="image" type="hidden" value="">


                                <div style="width: 8rem" class="preview-image-wrapper mb-1">
                                    <div class="preview-image-inner">
                                        <a data-bb-toggle="image-picker-choose" data-target="popup" class="image-box-actions" data-result="image" data-action="select-image" data-allow-thumb="1" href="#">
                                            <img class="preview-image default-image" data-default="https://laviola.collaudo.biz/vendor/core/core/base/images/placeholder.png" src="https://laviola.collaudo.biz/vendor/core/core/base/images/placeholder.png" alt="Anteprima immagine">
                                            <span class="image-picker-backdrop"></span>
                                        </a>
                                        <button class="btn btn-pill btn-icon  btn-sm image-picker-remove-button p-0" style="display: none; --bb-btn-font-size: 0.5rem;" type="button" data-bb-toggle="image-picker-remove" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Rimuovi immagine" data-bs-original-title="Rimuovi immagine">
                                            <svg class="icon icon-sm icon-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M18 6l-12 12"></path>
                                                <path d="M6 6l12 12"></path>
                                            </svg>

                                        </button>
                                    </div>
                                </div>

                                <a data-bb-toggle="image-picker-choose" data-target="popup" data-result="image" data-action="select-image" data-allow-thumb="1" href="#">
                                    Scegli immagine
                                </a>

                                <div data-bb-toggle="upload-from-url">
                                    <span class="text-muted">o</span>
                                    <a href="javascript:void(0)" class="mt-1" data-bs-toggle="modal" data-bs-target="#image-picker-add-from-url" data-bb-target=".image-box-image">
                                        Aggiungi da URL
                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <div class="col-md-3 gap-3 d-flex flex-column-reverse flex-md-column mb-md-0 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Publish
                        </h4>
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

                <div data-bb-waypoint="" data-bb-target="#form-actions"></div>

                <header class="top-0 w-100 position-fixed end-0 z-1000 vertical-wrapper" id="form-actions"
                        style="display: none;">
                    <div class="navbar">
                        <div class="container-xl">
                            <div class="row g-2 align-items-center w-100">
                                <div class="col">
                                    <div class="page-pretitle">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                            </ol>
                                        </nav>

                                    </div>
                                </div>
                                <div class="col-auto ms-auto d-print-none">
                                    <div class="btn-list">
                                        <button class="btn btn-primary" type="submit" value="apply" name="submitter">
                                            <svg class="icon icon-left" xmlns="http://www.w3.org/2000/svg" width="24"
                                                 height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                <path d="M14 4l0 4l-6 0l0 -4"></path>
                                            </svg>
                                            Save

                                        </button>

                                        <button class="btn" type="submit" name="submitter" value="save">
                                            <svg class="icon icon-left" xmlns="http://www.w3.org/2000/svg" width="24"
                                                 height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                        </div>
                    </div>
                </header>


                <div class="card meta-boxes">
                    <div class="card-header">
                        <h4 class="card-title">
                            <label for="status" class="form-label required">Status</label>
                        </h4>
                    </div>


                    <div class=" card-body">
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
                    $('.image-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        })
    </script>
@endpush
