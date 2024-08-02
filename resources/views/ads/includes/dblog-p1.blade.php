@if(isset($ads) && $ads)
    <div class="row mx-0">

            <div class="col-12 col-md-6 mb-4">
                <a href="" class="d-block">
                    <img src="{{ $ads->getImageUrl() }}" alt="{{ $ads->title }}" class="img-fluid" style="width: 100%; height: auto;">
                </a>
            </div>

    </div>
@endif



