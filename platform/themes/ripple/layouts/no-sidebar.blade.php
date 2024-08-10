{!! Theme::partial('header') !!}
@if (Theme::get('section-name'))
    @dd("سشنشد")
    {!! Theme::partial('breadcrumbs') !!}
@endif
{!! Theme::content() !!}
{!! Theme::partial('footer') !!}
