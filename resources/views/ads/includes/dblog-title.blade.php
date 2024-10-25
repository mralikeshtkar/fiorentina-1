@if (isset($ads) && $ads)
    <div class="row mx-0">
        @foreach ($ads as $ad)
                @if ($ad->type == 1)
                <div class="row justify-content-center mx-0">

                    <div class="col-12 mx-auto">
                        <a href="" class="d-block">
                            <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid"
                                style="width: 100%; height: auto;">
                        </a>
                    </div>

                </div>
            @else
                <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6741446998584415"
                    data-ad-slot="{{ $ad->image }}" data-ad-format="auto" data-full-width-responsive="true"></ins>
            @endif
        @endforeach
    </div>
@endif
