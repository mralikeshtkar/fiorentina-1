{!! Theme::partial('header') !!}
@if (Theme::get('section-name'))
    {!! Theme::partial('breadcrumbs') !!}
@endif
<section class="section pt-50 pb-100">
    @if (Theme::get('has-ads-background'))
        {!! BaseHelper::clean(Theme::get('has-ads-background')) !!}
    @endif

    <div class="container bg-white">
        <div class="row">
            {{--        <div class="row" > --}}
            <div class="col-lg-12">
                <div class="page-content">
                    {!! Theme::content() !!}
                </div>

            </div>
        </div>
</section>
{!! Theme::partial('footer') !!}
