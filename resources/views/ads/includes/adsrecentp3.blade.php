@if(isset($ad) && $ad)
    <div class="row justify-content-center mx-0">

        <div class="col-12 col-md-8 col-lg-12 mx-auto">
            <a href="" class="d-block">
                <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid" style="width: 100%; height: auto;">
            </a>
        </div>

    </div>
@endif
