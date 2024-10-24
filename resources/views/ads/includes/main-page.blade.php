@if (isset($ads) && $ads)
    <div class="container">
        <div class="row mx-0">
            @foreach ($ads as $ad)
                @if ($ad->type == 1)
                    <div class="row justify-content-center mx-0">

                        <div class="col-12 col-md-8 col-lg-6 mx-auto">
                            <a href="" class="d-block">
                                <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid"
                                    style="width: 100%; height: auto;">
                            </a>
                        </div>

                    </div>
                @else
                    <amp-ad width=468 height=60 type="doubleclick" data-slot="/166632497/468x60dx">
                    </amp-ad>
                @endif
            @endforeach
        </div>
    </div>
@endif
