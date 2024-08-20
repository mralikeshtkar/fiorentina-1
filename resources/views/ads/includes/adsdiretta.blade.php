@if(isset($ad) && $ad)
    <div class="row mx-0">

        <div class="col-12 col-md-8 col-lg-6 mx-auto">
            <a href="" class="d-block">
                <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid" style="width: 100%; height: auto;">
            </a>
        </div>

    </div>
@endif
