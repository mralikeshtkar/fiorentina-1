@extends(BaseHelper::getAdminMasterLayoutTemplate())
@section('content')
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <div id="post-body-content">
                <div id="titlediv">
                    <div id="titlewrap">
                        <label class="" id="title-prompt-text" for="title">Aggiungi titolo</label>
                        <input type="text" name="post_title" size="30" value="{{ old('post_title') }}" id="title" spellcheck="true" autocomplete="off">
                    </div>
                </div>
            </div>

            <div id="postbox-container-1" class="postbox-container">
                <div id="side-sortables" class="meta-box-sortables ui-sortable">
{{--                    @include('partials.publish-box')--}}
                </div>
            </div>

            <div id="postbox-container-2" class="postbox-container">
{{--                @include('partials.ad-main-box')--}}
            </div>
        </div>
        <br class="clear">
    </div>


{{-- Include partials for sections like publishing actions --}}
{{--@section('partials')--}}
{{--    --}}{{-- Publish Box --}}
{{--    @component('components.publish-box')--}}
{{--        --}}{{-- Dynamic data can be passed to components like this --}}
{{--        @slot('status', $postStatus ?? 'Draft')--}}
{{--    @endcomponent--}}

{{--    --}}{{-- Ad Main Box --}}
{{--    @component('components.ad-main-box')--}}
{{--        @slot('type', $adType ?? 'Standard')--}}
{{--    @endcomponent--}}



@stop
