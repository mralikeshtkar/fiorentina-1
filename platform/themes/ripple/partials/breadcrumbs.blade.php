<section
    data-background="{{ Theme::get('breadcrumbBannerImage') ?: (theme_option('default_breadcrumb_banner_image') ? RvMedia::getImageUrl(theme_option('default_breadcrumb_banner_image')) : Theme::asset()->url('images/1275061.png')) }}"
    class="section page-intro pt-30 pb-30 bg-cover">
    <div style="opacity: 0.6" class="bg-overlay"></div>
    <div class="container">
        <h3 class="page-intro__title">{{ Theme::get('section-name') ?: SeoHelper::getTitle() }}</h3>
        {!! Theme::breadcrumb()->render() !!}
    </div>
</section>
