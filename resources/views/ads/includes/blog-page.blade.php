
@if(isset($ads) && $ads)
    <div class="row mx-0">
        @foreach($ads as $ad)
            <div>

                    <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid">

            </div>
        @endforeach
    </div>
@endif


