@if(isset($ads) && $ads)
    <div class="container">
        <div class="row mx-0">
            @foreach($ads as $ad)
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
                <script>
                    googletag.cmd.push(function() {
                        googletag.defineSlot("/166632497/{{ $ad->title }}",[120,180], "div-gpt-ad-1729771067409-0").addService(googletag.pubads());
                        googletag.pubads().enableSingleRequest();
                        googletag.enableServices();
                    });
                </script>
                    <div id='div-gpt-ad-1729771067409-0'>
                        <script>
                          googletag.cmd.push(function() { googletag.display('div-gpt-ad-1729771067409-0'); });
                        </script>
                      </div>

                @endif
            @endforeach
        </div>
    </div>
@endif
