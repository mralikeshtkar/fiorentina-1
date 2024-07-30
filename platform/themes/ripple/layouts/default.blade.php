{!! Theme::partial('header') !!}
@if (Theme::get('section-name'))
    {!! Theme::partial('breadcrumbs') !!}
@endif
<section class="section pt-50 pb-100">
    <div class="container">
{{--        <div class="row" style="background-color: white !important;">--}}
        <div class="row" >
            <div class="col-lg-9">
                <div class="page-content">
                    {!! Theme::content() !!}
                        @include('ads.includes.dblog-p1')
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
