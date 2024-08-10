{!! Theme::partial('header') !!}
@if (Theme::get('section-name'))
    {!! Theme::partial('breadcrumbs') !!}
@endif
<section class="section pt-50 pb-100">
    @php dd("salam"); @endphp
    @if(Theme::get('has-ads-background'))
        {!! BaseHelper::clean(Theme::get('has-ads-background')) !!}
    @endif

    <div class="container">
        <div class="row" style="background-color: white !important;">
{{--        <div class="row" >--}}
            <div class="col-lg-9" style="background-color: red !important;">
                <div class="page-content" style="background-color: blue !important;">
                    {!! Theme::content() !!}

                </div>
            </div>
            <div class="col-lg-3">
                <div class="page-sidebar">
                    {!! Theme::partial('sidebar') !!}
                </div>
            </div>
        </div>
    </div>
</section>
{!! Theme::partial('footer') !!}
