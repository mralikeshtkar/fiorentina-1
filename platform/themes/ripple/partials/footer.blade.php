</div>
<footer class="page-footer bg-dark pt-50">
    <div class="container">
        <div class="row">
            @if (theme_option('address') ||
                    theme_option('website') ||
                    theme_option('contact_email') ||
                    theme_option('site_description'))
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                    <aside class="widget widget--transparent widget__footer widget__about">
                        <div class="widget__header">
                            <h3 class="widget__title">{{ __('About us') }}</h3>
                        </div>
                        <div class="widget__content">
                            <p>{{ theme_option('site_description') }}</p>
                            <div class="person-detail">
                                @if ($address = theme_option('address'))
                                    <p>{!! BaseHelper::renderIcon('ti ti-home') !!} {{ $address }}</p>
                                @endif
                                @if ($website = theme_option('website'))
                                    <p>{!! BaseHelper::renderIcon('ti ti-world') !!} {{ Html::link($website) }}</p>
                                @endif
                                @if ($email = theme_option('contact_email'))
                                    <p>{!! BaseHelper::renderIcon('ti ti-mail') !!} {{ Html::mailto($email) }}</p>
                                @endif
                            </div>
                        </div>
                    </aside>
                </div>
            @endif
            {!! dynamic_sidebar('footer_sidebar') !!}
        </div>
    </div>
    <div class="page-footer__bottom">
        <div class="container">
            <div class="row">
                @if ($copyright = theme_option('copyright'))
                    <div class="col-md-8 col-sm-6 text-start">
                        <div class="page-copyright">
                            <p>{!! Theme::getSiteCopyright() !!}</p>
                        </div>
                    </div>
                @endif
                @if ($socialLinks = Theme::getSocialLinks())
                    <div class="col-md-4 col-sm-6 text-end">
                        <div class="page-footer__social">
                            <ul class="social social--simple">
                                @foreach ($socialLinks as $socialLink)
                                    @continue(!($icon = $socialLink->getIconHtml()))

                                    <li>
                                        <a {{ $socialLink->getAttributes() }}>
                                            {{ $icon }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</footer>
<div id="back2top">
    {!! BaseHelper::renderIcon('ti ti-arrow-narrow-up') !!}
</div>

{!! Theme::footer() !!}



<div class="container">

</div>


<script>
    $(document).ready(async function() {
        // Define the images with Bootstrap classes and custom styling
        var leftImage =
            '<div class="col-6 d-flex flex-row"><img src="http://localhost:8000/storage/16462360066530278727.gif" class="float-left d-none d-sm-block" alt="Left Image"></div>';
        var rightImage =
            '<div class="col-6 d-flex flex-row-reverse"><img src="http://localhost:8000/storage/6357840656918928791.gif" class="float-right d-none d-sm-block" alt="Right Image"></div>';

        var row = '<div class="container mt-20"><div class="row">' + leftImage + rightImage +
            '</div></div>';

        var hero =
            '<div class="col-12 d-flex justify-content-center"><img src="http://localhost:8000/storage/728x200-la-viola-ecobonus.gif" class="float-right d-none d-sm-block" alt="Right Image"></div>';
        var row1 = '<div class="container"><div class="row">' + hero + '</div></div>';

        $('.recent-posts').before(row1);
        $('.page-header').after(row);
    });
</script>
</body>

</html>
