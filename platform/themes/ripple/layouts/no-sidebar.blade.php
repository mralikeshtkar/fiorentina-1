{!! Theme::partial('header') !!}
@if(Theme::get('has-ads-background'))
    {!! BaseHelper::clean(Theme::get('has-ads-background')) !!}
@endif
@if (Theme::get('section-name'))
    {!! Theme::partial('breadcrumbs') !!}
@endif
{!! Theme::content() !!}
{!! Theme::partial('footer') !!}
