
@if(isset($ads) && $ads)
    <div class="row mx-0">
        @foreach($ads as $ad)
            <div class="row">
                <a href="">
                    <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="img-fluid">
                </a>


            </div>
        @endforeach
    </div>
@endif


