
@if(isset($ads) && $ads)
    <div class="row mx-0">
        @foreach($ads as $ad)
            <div class="col-12 col-md-6 mb-4">
                <a href="" class="d-block w-100">
                    <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid">
                </a>
            </div>
        @endforeach
    </div>
@endif


