@if (isset($ads) && $ads)
    <div class="row mx-0">
        @foreach ($ads as $ad)
            <div class="col-lg-8">
                <a href="" class="d-block">
                    <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid"
                        style="width: 100%; height: auto;">
                </a>
            </div>
        @endforeach
    </div>
@endif
