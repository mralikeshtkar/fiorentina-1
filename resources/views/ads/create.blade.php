@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
{{--    <form action="{{ route('ad.submit') }}" method="POST" enctype="multipart/form-data">--}}
<form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- CSRF Token for Laravel, ensures your form is secure -->


            <div class="row">

                <div class="gap-3 col-md-9">
{{--                    <div class="card mb-3">--}}
{{--                        <div class="card-body">--}}
{{--                            <div id="post-body" class="metabox-holder columns-2">--}}
{{--                                <div id="post-body-content">--}}
{{--                                    <div id="titlediv">--}}
{{--                                        <div id="titlewrap">--}}
{{--                                            <label class="" id="title-prompt-text" for="title">Aggiungi titolo</label>--}}
{{--                                            <input type="text" name="post_title" size="30" value="{{ old('post_title') }}" id="title" spellcheck="true" autocomplete="off">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div id="postbox-container-1" class="postbox-container">--}}
{{--                                    <div id="side-sortables" class="meta-box-sortables ui-sortable">--}}
{{--                                        <div id="submitdiv" class="postbox ">--}}
{{--                                            <div class="postbox-header">--}}
{{--                                                <h2 class="hndle ui-sortable-handle">Pubblica</h2>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div id="postbox-container-2" class="postbox-container">--}}
{{--                                    <div id="normal-sortables" class="meta-box-sortables ui-sortable">--}}
{{--                                        <div id="ad-main-box" class="postbox ">--}}
{{--                                            <div class="postbox-header">--}}
{{--                                                <h2 class="hndle ui-sortable-handle">Tipo Annuncio:</h2>--}}
{{--                                            </div>--}}
{{--                                            <div class="inside">--}}
{{--                                                <ul id="ad-main-box-notices" class="advads-metabox-notices"></ul>--}}
{{--                                                <select name="advanced_ad[type]" id="advanced-ad-type">--}}
{{--                                                    <option value="1" {{ old('advanced_ad[type]') == '1' ? 'selected' : '' }}>Annuncio immagine</option>--}}
{{--                                                    <option value="2" {{ old('advanced_ad[type]') == '2' ? 'selected' : '' }}>Google Ad Manager</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <label for="imageUpload">Upload an image:</label>--}}
{{--                                    <input type="file" id="imageUpload" name="image" accept="image/*">--}}
{{--                                </div>--}}
{{--                                <!-- Continue with the rest of the form content... -->--}}
{{--                            </div>--}}
{{--                            <div id="ad-parameters-box" class="postbox">--}}
{{--                                <div class="postbox-header">--}}
{{--                                    <h2 class="hndle ui-sortable-handle">Parametri annuncio</h2>--}}
{{--                                    <div class="handle-actions hide-if-no-js">--}}
{{--                                        <button type="button" class="handle-order-higher" aria-disabled="false" aria-describedby="ad-parameters-box-handle-order-higher-description">--}}
{{--                                            <span class="screen-reader-text">Sposta in alto</span>--}}
{{--                                            <span class="order-higher-indicator" aria-hidden="true"></span>--}}
{{--                                        </button>--}}
{{--                                        <span class="hidden" id="ad-parameters-box-handle-order-higher-description">Sposta in su il riquadro Parametri annuncio</span>--}}
{{--                                        <button type="button" class="handle-order-lower" aria-disabled="false" aria-describedby="ad-parameters-box-handle-order-lower-description">--}}
{{--                                            <span class="screen-reader-text">Sposta in basso</span>--}}
{{--                                            <span class="order-lower-indicator" aria-hidden="true"></span>--}}
{{--                                        </button>--}}
{{--                                        <span class="hidden" id="ad-parameters-box-handle-order-lower-description">Sposta in giù il riquadro Parametri annuncio</span>--}}
{{--                                        <button type="button" class="handlediv" aria-expanded="true">--}}
{{--                                            <span class="screen-reader-text">Attiva/disattiva il pannello: Parametri annuncio</span>--}}
{{--                                            <span class="toggle-indicator" aria-hidden="true"></span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="inside">--}}
{{--                                    <ul id="ad-parameters-box-notices" class="advads-metabox-notices">--}}
{{--                                        --}}{{--                    @if($adsense_active)--}}
{{--                                        --}}{{--                        <li class="advads-auto-ad-in-ad-content advads-notice-inline advads-error">Il codice di verifica AdSense e gli Annunci automatici sono già attivati nelle <a href="https://www.laviola.it/wp-admin/admin.php?page=advanced-ads-settings#top#adsense">impostazioni AdSense</a>. Non è necessario aggiungere manualmente il codice qui, a meno che non lo si voglia includere solo in determinate pagine.</li>--}}
{{--                                        --}}{{--                    @endif--}}
{{--                                        --}}{{--                    @if($not_supported_on_amp)--}}
{{--                                        --}}{{--                        <li class="advanced-ads-adsense-amp-warning advads-notice-inline advads-idea">Questo tipo di annuncio non è supportato nelle pagine AMP</li>--}}
{{--                                        --}}{{--                    @endif--}}
{{--                                        --}}{{--                    @if($adsense_position_error)--}}
{{--                                        --}}{{--                        <li class="advads-ad-notice-responsive-position advads-notice-inline advads-error">Gli annunci AdSense adattabili non funzionano in modo affidabile con <em>Posizione</em> impostata a sinistra o a destra. O cambi il <em>Tipo</em> a "normale" o segui <a href="https://wpadvancedads.com/adsense-responsive-custom-sizes/?utm_source=advanced-ads&amp;utm_medium=link&amp;utm_campaign=adsense-custom-sizes-tutorial" target="_blank">questo tutorial</a> se vuoi che l'annuncio sia racchiuso nel testo.</li>--}}
{{--                                        --}}{{--                    @endif--}}
{{--                                    </ul>--}}
{{--                                    <div id="advanced-ads-tinymce-wrapper" style="display: none;">--}}
{{--                                        --}}{{--                    @include('partials.advanced-ads-tinymce')--}}
{{--                                    </div>--}}
{{--                                    <div id="advanced-ads-ad-parameters" class="advads-option-list">--}}
{{--                                        <label for="advads-group-id" class="label">gruppo annunci</label>--}}
{{--                                        <div>--}}
{{--                                            <select name="advanced_ad_id" id="advads-group-id">--}}
{{--                                                <option value="514">230x90 centrale</option>--}}
{{--                                                <option value="515">230x90 dx</option>--}}
{{--                                                <option value="513">230x90 sx</option>--}}
{{--                                                <option value="486">300x250 b1</option>--}}
{{--                                                <option value="485">300x250 c1</option>--}}
{{--                                                <option value="367">300x250 top</option>--}}
{{--                                                <option value="364">468x60 top dx</option>--}}
{{--                                                <option value="362">468x60 top sx</option>--}}
{{--                                                <option value="366">728x90 b1</option>--}}
{{--                                                <option value="365">728x90 c1</option>--}}
{{--                                                <option value="483">728x90 c2</option>--}}
{{--                                                <option value="512">728X90 testata</option>--}}
{{--                                                <option value="8294">Gruppo popup desktop</option>--}}
{{--                                                <option value="9098">Gruppo popup mobile</option>--}}
{{--                                                <option value="18513">In Article Desktop 2024</option>--}}
{{--                                                <option value="8365">Mobile dopo foto</option>--}}
{{--                                                <option value="18512">Mobile home Top 24</option>--}}
{{--                                                <option value="8507">Mobile posizione 1</option>--}}
{{--                                                <option value="8508">Mobile posizione 2</option>--}}
{{--                                                <option value="8364">Mobile posizione 3</option>--}}
{{--                                                <option value="8503">Mobile posizione 4</option>--}}
{{--                                                <option value="16686">Mobile posizione 5</option>--}}
{{--                                                <option value="18587">rotation 100</option>--}}
{{--                                                <option value="18586">Rotazione 728x200</option>--}}
{{--                                                <option value="578">Skin</option>--}}
{{--                                                <option value="2915">Skin_mobile</option>--}}
{{--                                            </select>--}}

{{--                                        </div>--}}
{{--                                        <hr>--}}
{{--                                        <span class="label">dimensione</span>--}}
{{--                                        <div id="advanced-ads-ad-parameters-size">--}}
{{--                                            <label>larghezza<input type="number" value="{{ $ad_width ?? 0 }}" name="advanced_ad[width]">px</label>--}}
{{--                                            <label>altezza<input type="number" value="{{ $ad_height ?? 0 }}" name="advanced_ad[height]">px</label>--}}
{{--                                            --}}{{--                        <label><input type="checkbox" id="advads-wrapper-add-sizes" name="advanced_ad[output][add_wrapper_sizes]" value="true" @if($reserve_space) disabled @endif>prenota questo spazio</label>--}}
{{--                                            <label><input type="checkbox" id="advads-wrapper-add-sizes" name="advanced_ad[output][add_wrapper_sizes]" value="true" >prenota questo spazio</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div id="advads-cache-busting-check-wrap">--}}
{{--            <span id="advads-cache-busting-error-result" class="advads-notice-inline advads-error" style="display:none;">--}}
{{--                Il codice di questo annuncio potrebbe non funzionare correttamente con il busting della cache attivato. <a href="https://wpadvancedads.com/manual/cache-busting/#advads-passive-compatibility-warning" target="_blank">Manuale</a>--}}
{{--            </span>--}}
{{--                                        <input type="hidden" id="advads-cache-busting-possibility" name="advanced_ad[cache-busting][possible]" value="true">--}}
{{--                                    </div>--}}
{{--                                    <script>--}}
{{--                                        jQuery( document ).ready(function() {--}}
{{--                                            if ( typeof advads_cb_check_ad_markup !== 'undefined' ){--}}
{{--                                                var ad_content = "";--}}
{{--                                                advads_cb_check_ad_markup( ad_content );--}}
{{--                                            }--}}
{{--                                        });--}}
{{--                                    </script>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div id="ad-output-box" class="postbox">--}}
{{--                                <div class="postbox-header">--}}
{{--                                    <h2 class="hndle ui-sortable-handle">--}}
{{--                                        Layout / Output--}}
{{--                                        <span class="advads-hndlelinks">--}}
{{--                <a href="https://wpadvancedads.com/manual/optimizing-the-ad-layout/?utm_source=advanced-ads&amp;utm_medium=link&amp;utm_campaign=edit-ad-layout" target="_blank" class="advads-manual-link">Manuale</a>--}}
{{--            </span>--}}
{{--                                    </h2>--}}
{{--                                    <div class="handle-actions hide-if-no-js">--}}
{{--                                        <button type="button" class="handle-order-higher" aria-disabled="false" aria-describedby="ad-output-box-handle-order-higher-description">--}}
{{--                                            <span class="screen-reader-text">Sposta in alto</span>--}}
{{--                                            <span class="order-higher-indicator" aria-hidden="true"></span>--}}
{{--                                        </button>--}}
{{--                                        <span class="hidden" id="ad-output-box-handle-order-higher-description">Sposta in su il riquadro Layout / Output</span>--}}
{{--                                        <button type="button" class="handle-order-lower" aria-disabled="false" aria-describedby="ad-output-box-handle-order-lower-description">--}}
{{--                                            <span class="screen-reader-text">Sposta in basso</span>--}}
{{--                                            <span class="order-lower-indicator" aria-hidden="true"></span>--}}
{{--                                        </button>--}}
{{--                                        <span class="hidden" id="ad-output-box-handle-order-lower-description">Sposta in giù il riquadro Layout / Output</span>--}}
{{--                                        <button type="button" class="handlediv" aria-expanded="true">--}}
{{--                                            <span class="screen-reader-text">Attiva/disattiva il pannello: Layout / Output</span>--}}
{{--                                            <span class="toggle-indicator" aria-hidden="true"></span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="inside">--}}
{{--                                    <ul id="ad-output-box-notices" class="advads-metabox-notices"></ul>--}}
{{--                                    <div class="advads-ad-positioning">--}}
{{--                                        <div class="advads-ad-positioning-position advads-option-list">--}}
{{--                                            <span class="label">Flusso di testo</span>--}}
{{--                                            <div class="advads-ad-positioning-position-groups-wrapper">--}}
{{--                                                <!-- Example of hard-coded positions -->--}}
{{--                                                <div class="advads-ad-positioning-position-group">--}}
{{--                                                    <h3 class="advads-ad-positioning-position-group-heading">Predefinito del tema</h3>--}}
{{--                                                    <label class="advads-ad-positioning-position-wrapper is-checked" for="advads-ad-positioning-position-none">--}}
{{--                                                        <input type="radio" class="advads-ad-positioning-position-option" name="advanced_ad[output][position]" id="advads-ad-positioning-position-none" value="none" checked>--}}
{{--                                                        <div class="advads-ad-positioning-position-icon">--}}
{{--                                                            <!-- SVG or other icon HTML -->--}}
{{--                                                        </div>--}}
{{--                                                    </label>--}}
{{--                                                    <p class="advads-ad-positioning-position-group-description">--}}
{{--                                                        L'annuncio si comporterà come predefinito dal tema.--}}
{{--                                                    </p>--}}
{{--                                                </div>--}}
{{--                                                <!-- More groups can be added here as static content -->--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <hr class="advads-hide-in-wizard">--}}
{{--                                        <!-- Margin settings are hard-coded here -->--}}
{{--                                        <div class="advads-ad-positioning-spacing advads-option-list">--}}
{{--                                            <span class="label">Margine</span>--}}
{{--                                            <div class="advads-ad-positioning-spacing-wrapper">--}}
{{--                                                <!-- Input fields for margin settings -->--}}
{{--                                                <label for="advads-ad-positioning-spacing-top">--}}
{{--                                                    <span class="label screen-reader-text">In alto</span>--}}
{{--                                                    <input type="number" step="1" id="advads-ad-positioning-spacing-top" class="advads-ad-positioning-spacing-option" name="advanced_ad[output][margin][top]" value="0">--}}
{{--                                                </label>--}}
{{--                                                <!-- Other margin settings -->--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <br class="clear">--}}
{{--                            <div id="ad-targeting-box" class="postbox">--}}
{{--                                <div class="postbox-header">--}}
{{--                                    <h2 class="hndle ui-sortable-handle">--}}
{{--                                        Targetizzazione--}}
{{--                                        <span class="advads-hndlelinks">--}}
{{--                <a href="#" class="advads-video-link">Video</a>--}}
{{--                <a href="https://wpadvancedads.com/manual/display-conditions/?utm_source=advanced-ads&amp;utm_medium=link&amp;utm_campaign=edit-display" target="_blank" class="advads-manual-link">Condizioni di Visualizzazione</a>--}}
{{--                <a href="https://wpadvancedads.com/manual/visitor-conditions/?utm_source=advanced-ads&amp;utm_medium=link&amp;utm_campaign=edit-visitor" target="_blank" class="advads-manual-link">Condizioni per Visitatore</a>--}}
{{--            </span>--}}
{{--                                    </h2>--}}
{{--                                    <div class="handle-actions hide-if-no-js">--}}
{{--                                        <button type="button" class="handle-order-higher" aria-disabled="false" aria-describedby="ad-targeting-box-handle-order-higher-description">--}}
{{--                                            <span class="screen-reader-text">Sposta in alto</span>--}}
{{--                                            <span class="order-higher-indicator" aria-hidden="true"></span>--}}
{{--                                        </button>--}}
{{--                                        <span class="hidden" id="ad-targeting-box-handle-order-higher-description">Sposta in su il riquadro Targetizzazione</span>--}}
{{--                                        <button type="button" class="handle-order-lower" aria-disabled="false" aria-describedby="ad-targeting-box-handle-order-lower-description">--}}
{{--                                            <span class="screen-reader-text">Sposta in basso</span>--}}
{{--                                            <span class="order-lower-indicator" aria-hidden="true"></span>--}}
{{--                                        </button>--}}
{{--                                        <span class="hidden" id="ad-targeting-box-handle-order-lower-description">Sposta in giù il riquadro Targetizzazione</span>--}}
{{--                                        <button type="button" class="handlediv" aria-expanded="true">--}}
{{--                                            <span class="screen-reader-text">Attiva/disattiva il pannello: Targetizzazione</span>--}}
{{--                                            <span class="toggle-indicator" aria-hidden="true"></span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="inside">--}}
{{--                                    --}}{{--            <div class="advads-video-link-container" data-videolink="{{ $iframeEmbedCode }}"></div>--}}
{{--                                    <div class="advads-video-link-container" data-videolink=""></div>--}}
{{--                                    <div class="advads-video-link-container" data-videolink=""></div>--}}
{{--                                    <ul id="ad-targeting-box-notices" class="advads-metabox-notices"></ul>--}}
{{--                                    <div class="advads-show-in-wizard" style="display: none;">--}}
{{--                                        <p>Fai clic sul pulsante in basso se l'annuncio NON deve essere visualizzato su tutte le pagine se incluso automaticamente.</p>--}}
{{--                                        <button type="button" class="button button-secondary" id="advads-wizard-display-conditions-show">Nascondi l'annuncio su alcune pagine</button>--}}
{{--                                    </div>--}}
{{--                                    <h3>--}}
{{--                                        Condizioni di Visualizzazione--}}
{{--                                        <span class="advads-help">--}}
{{--                <span class="advads-tooltip">--}}
{{--                    Limita l'annuncio alle pagine che soddisfano le seguenti condizioni. Non fare nulla qui se l'annuncio deve apparire ovunque lo incorpori.--}}
{{--                </span>--}}
{{--            </span>--}}
{{--                                    </h3>--}}
{{--                                    <div id="advads-display-conditions" class="advads-hide-in-wizard">--}}
{{--                                        <table id="advads-ad-display-conditions" class="advads-conditions-table">--}}
{{--                                            <tbody>--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                        <fieldset data-condition-list-target="advads-ad-display-conditions" data-condition-form-name="advanced_ad[conditions]" data-condition-action="load_display_conditions_metabox" data-condition-connector-default="or" class="advads-hide-in-wizard">--}}
{{--                                            <legend>Nuova condizione</legend>--}}
{{--                                            <input type="hidden" class="advads-conditions-index" value="0">--}}
{{--                                            <div class="advads-conditions-new">--}}
{{--                                                <select>--}}
{{--                                                    <option value="">-- scegli una condizione --</option>--}}
{{--                                                    <!-- Hard coded conditions -->--}}
{{--                                                </select>--}}
{{--                                                <span class="advads-loader" style="display: none;"></span>--}}
{{--                                            </div>--}}
{{--                                        </fieldset>--}}
{{--                                    </div>--}}
{{--                                    <div class="advads-show-in-wizard" style="display: none;">--}}
{{--                                        <p>Fai clic sul pulsante in basso se l'annuncio NON deve essere visibile a tutti i visitatori</p>--}}
{{--                                        <button type="button" class="button button-secondary" id="advads-wizard-visitor-conditions-show">Nascondi l'annuncio ad alcuni utenti</button>--}}
{{--                                    </div>--}}

{{--                                    <hr>--}}
{{--                                    <h3>--}}
{{--                                        Condizioni per Visitatore--}}
{{--                                        <span class="advads-help">--}}
{{--                <span class="advads-tooltip">--}}
{{--                    Indirizza l'annuncio a gruppi di utenti specifici che soddisfano le seguenti condizioni. Non fare nulla qui se tutti gli utenti dovrebbero vedere l'annuncio.--}}
{{--                </span>--}}
{{--            </span>--}}
{{--                                    </h3>--}}

{{--                                    <div id="advads-visitor-conditions" class="advads-hide-in-wizard">--}}
{{--                                        <table id="advads-ad-visitor-conditions" class="advads-conditions-table">--}}
{{--                                            <tbody>--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                        <fieldset data-condition-list-target="advads-ad-visitor-conditions" data-condition-form-name="advanced_ad[visitors]" data-condition-action="load_visitor_conditions_metabox" data-condition-connector-default="and" class="advads-hide-in-wizard">--}}
{{--                                            <legend>Nuova condizione</legend>--}}
{{--                                            <input type="hidden" class="advads-conditions-index" value="0">--}}
{{--                                            <div class="advads-conditions-new">--}}
{{--                                                <select>--}}
{{--                                                    <option value="">-- scegli una condizione --</option>--}}
{{--                                                    <!-- Hard coded visitor conditions -->--}}
{{--                                                </select>--}}
{{--                                                <span class="advads-loader" style="display: none;"></span>--}}
{{--                                            </div>--}}
{{--                                        </fieldset>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="metabox-holder columns-2" id="post-body">
                                <!-- Title Section -->
                                <div class="post-body-content">
                                    <div class="mb-3" id="titlediv">
                                        <label for="title" class="form-label" id="title-prompt-text">Aggiungi titolo</label>
                                        <input type="text" class="form-control" name="post_title" id="title" value="{{ old('post_title') }}" spellcheck="true" autocomplete="off">
                                    </div>
                                </div>

                                <!-- Publish Section -->
                                <div class="postbox-container" id="postbox-container-1">
                                    <div class="meta-box-sortables ui-sortable" id="side-sortables">
                                        <div class="postbox" id="submitdiv">
                                            <div class="postbox-header">
                                                <h2 class="hndle ui-sortable-handle">Pubblica</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Ad Type Selection -->
                                <div class="postbox-container" id="postbox-container-2">
                                    <div class="meta-box-sortables ui-sortable" id="normal-sortables">
                                        <div class="postbox" id="ad-main-box">
                                            <div class="postbox-header">
                                                <h2 class="hndle ui-sortable-handle">Tipo Annuncio:</h2>
                                            </div>
                                            <div class="inside">
                                                <select class="form-select" name="advanced_ad[type]" id="advanced-ad-type">
                                                    <option value="1" {{ old('advanced_ad[type]') == '1' ? 'selected' : '' }}>Annuncio immagine</option>
                                                    <option value="2" {{ old('advanced_ad[type]') == '2' ? 'selected' : '' }}>Google Ad Manager</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Upload Section -->
                                <div class="row mb-3">
                                    <label for="imageUpload" class="form-label">Upload an image:</label>
                                    <input type="file" class="form-control" id="imageUpload" name="image" accept="image/*">
                                </div>

                                <!-- Ad Parameters Section -->
                                <div class="postbox" id="ad-parameters-box">
                                    <div class="postbox-header">
                                        <h2 class="hndle ui-sortable-handle">Parametri annuncio</h2>
                                    </div>
                                    <div class="inside">
                                        <label for="advads-group-id" class="form-label">Gruppo annunci</label>
                                        <select class="form-select" name="advanced_ad_id" id="advads-group-id">
                                            <!-- Options go here -->
                                        </select>

                                        <div class="mt-3">
                                            <label for="width" class="form-label">Larghezza (px)</label>
                                            <input type="number" class="form-control" id="width" name="advanced_ad[width]" value="{{ $ad_width ?? 0 }}">
                                        </div>
                                        <div class="mt-3">
                                            <label for="height" class="form-label">Altezza (px)</label>
                                            <input type="number" class="form-control" id="height" name="advanced_ad[height]" value="{{ $ad_height ?? 0 }}">
                                        </div>
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" id="advads-wrapper-add-sizes" name="advanced_ad[output][add_wrapper_sizes]" value="true">
                                            <label class="form-check-label" for="advads-wrapper-add-sizes">Prenota questo spazio</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 gap-3 d-flex flex-column-reverse flex-md-column mb-md-0 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Publish
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="btn-list">
                                <button class="btn btn-primary" type="submit" value="apply" name="submitter">
                                    <svg class="icon icon-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                        <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M14 4l0 4l-6 0l0 -4"></path>
                                    </svg>
                                    Save

                                </button>

                                <button class="btn" type="submit" name="submitter" value="save">
                                    <svg class="icon icon-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 18v3h16v-14l-8 -4l-8 4v3"></path>
                                        <path d="M4 14h9"></path>
                                        <path d="M10 11l3 3l-3 3"></path>
                                    </svg>
                                    Save &amp; Exit

                                </button>


                            </div>
                        </div>
                    </div>

                    <div data-bb-waypoint="" data-bb-target="#form-actions"></div>

                    <header class="top-0 w-100 position-fixed end-0 z-1000 vertical-wrapper" id="form-actions" style="display: none;">
                        <div class="navbar">
                            <div class="container-xl">
                                <div class="row g-2 align-items-center w-100">
                                    <div class="col">
                                        <div class="page-pretitle">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                </ol>
                                            </nav>

                                        </div>
                                    </div>
                                    <div class="col-auto ms-auto d-print-none">
                                        <div class="btn-list">
                                            <button class="btn btn-primary" type="submit" value="apply" name="submitter">
                                                <svg class="icon icon-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                    <path d="M14 4l0 4l-6 0l0 -4"></path>
                                                </svg>
                                                Save

                                            </button>

                                            <button class="btn" type="submit" name="submitter" value="save">
                                                <svg class="icon icon-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 18v3h16v-14l-8 -4l-8 4v3"></path>
                                                    <path d="M4 14h9"></path>
                                                    <path d="M10 11l3 3l-3 3"></path>
                                                </svg>
                                                Save &amp; Exit

                                            </button>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>



                    <div class="card meta-boxes">
                        <div class="card-header">
                            <h4 class="card-title">
                                <label for="status" class="form-label required">Status</label>
                            </h4>
                        </div>


                        <div class=" card-body">
                            <select data-placeholder="Select an option" class="form-control form-select" required="required" id="status" name="status" aria-required="true"><option value="published">Published</option><option value="draft">Draft</option><option value="pending">Pending</option></select>






                        </div>
                    </div>

                </div>

            </div>









    </form>
@endsection

