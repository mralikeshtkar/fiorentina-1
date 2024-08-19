@if(isset($ads) && $ads)
    <div class="container">
        <div class="row mx-0">
            @foreach($ads as $ad)
                <div class="col-12 col-md-6">
                    <a href="" class="d-block w-full">
                        <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="w-full d-block">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endif
