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
                    <div id="submitdiv" class="postbox ">
                        <div class="postbox-header">
                            <h2 class="hndle ui-sortable-handle">Pubblica</h2>
                        </div>
                        <div class="inside">
                            <div class="submitbox" id="submitpost">
                                <div id="minor-publishing">
                                    <div style="display:none;">
                                        <input type="submit" name="save" id="save" class="button" value="Salva">
                                    </div>
                                    <div id="minor-publishing-actions">
                                        <div id="save-action">
                                            <input type="submit" name="save" id="save-post" value="Salva bozza" class="button">
                                            <span class="spinner"></span>
                                        </div>
                                    </div>
                                    <div id="misc-publishing-actions">
                                        <div class="misc-pub-section misc-pub-post-status">
                                            Stato:
                                            <span id="post-status-display">
                                            Bozza
                                        </span>
                                            <a href="#post_status" class="edit-post-status hide-if-no-js" role="button">
                                                <span aria-hidden="true">Modifica</span>
                                                <span class="screen-reader-text">Modifica stato</span>
                                            </a>
                                            <div id="post-status-select" class="hide-if-js">
                                                <input type="hidden" name="hidden_post_status" id="hidden_post_status" value="draft">
                                                <select name="post_status" id="post_status">
                                                    <option value="pending">In attesa di revisione</option>
                                                    <option selected="selected" value="draft">Bozza</option>
                                                </select>
                                                <a href="#post_status" class="save-post-status hide-if-no-js button">OK</a>
                                                <a href="#post_status" class="cancel-post-status hide-if-no-js button-cancel">Annulla</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="postbox-container-2" class="postbox-container">
                <div id="normal-sortables" class="meta-box-sortables ui-sortable">
                    <div id="ad-main-box" class="postbox ">
                        <div class="postbox-header">
                            <h2 class="hndle ui-sortable-handle">Tipo Annuncio: Testo semplice e Codice</h2>
                        </div>
                        <div class="inside">
                            <ul id="ad-main-box-notices" class="advads-metabox-notices"></ul>
                            <ul id="advanced-ad-type">
                                <li class="advanced-ads-type-list-plain">
                                    <input type="radio" name="advanced_ad[type]" id="advanced-ad-type-plain" value="plain" checked="checked">
                                    <label for="advanced-ad-type-plain">Testo semplice e Codice</label>
                                </li>
                                <li class="advanced-ads-type-list-plain">
                                    <input type="radio" name="advanced_ad[type]" id="advanced-ad-type-plain" value="plain" checked="checked">
                                    <label for="advanced-ad-type-plain">fittizio</label>
                                </li>
                                <li class="advanced-ads-type-list-plain">
                                    <input type="radio" name="advanced_ad[type]" id="advanced-ad-type-plain" value="plain" checked="checked">
                                    <label for="advanced-ad-type-plain">Testo semplice e Codice</label>
                                </li>
                                <li class="advanced-ads-type-list-plain">
                                    <input type="radio" name="advanced_ad[type]" id="advanced-ad-type-plain" value="plain" checked="checked">
                                    <label for="advanced-ad-type-plain">Testo semplice e Codice</label>
                                </li>
                                <li class="advanced-ads-type-list-plain">
                                    <input type="radio" name="advanced_ad[type]" id="advanced-ad-type-plain" value="plain" checked="checked">
                                    <label for="advanced-ad-type-plain">Testo semplice e Codice</label>
                                </li>
                                {{-- Additional ad types here --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ad-parameters-box" class="postbox">
                <div class="postbox-header">
                    <h2 class="hndle ui-sortable-handle">Parametri annuncio</h2>
                    <div class="handle-actions hide-if-no-js">
                        <button type="button" class="handle-order-higher" aria-disabled="false" aria-describedby="ad-parameters-box-handle-order-higher-description">
                            <span class="screen-reader-text">Sposta in alto</span>
                            <span class="order-higher-indicator" aria-hidden="true"></span>
                        </button>
                        <span class="hidden" id="ad-parameters-box-handle-order-higher-description">Sposta in su il riquadro Parametri annuncio</span>
                        <button type="button" class="handle-order-lower" aria-disabled="false" aria-describedby="ad-parameters-box-handle-order-lower-description">
                            <span class="screen-reader-text">Sposta in basso</span>
                            <span class="order-lower-indicator" aria-hidden="true"></span>
                        </button>
                        <span class="hidden" id="ad-parameters-box-handle-order-lower-description">Sposta in giù il riquadro Parametri annuncio</span>
                        <button type="button" class="handlediv" aria-expanded="true">
                            <span class="screen-reader-text">Attiva/disattiva il pannello: Parametri annuncio</span>
                            <span class="toggle-indicator" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
                <div class="inside">
                    <ul id="ad-parameters-box-notices" class="advads-metabox-notices">
                        @if($adsense_active)
                            <li class="advads-auto-ad-in-ad-content advads-notice-inline advads-error">Il codice di verifica AdSense e gli Annunci automatici sono già attivati nelle <a href="https://www.laviola.it/wp-admin/admin.php?page=advanced-ads-settings#top#adsense">impostazioni AdSense</a>. Non è necessario aggiungere manualmente il codice qui, a meno che non lo si voglia includere solo in determinate pagine.</li>
                        @endif
                        @if($not_supported_on_amp)
                            <li class="advanced-ads-adsense-amp-warning advads-notice-inline advads-idea">Questo tipo di annuncio non è supportato nelle pagine AMP</li>
                        @endif
                        @if($adsense_position_error)
                            <li class="advads-ad-notice-responsive-position advads-notice-inline advads-error">Gli annunci AdSense adattabili non funzionano in modo affidabile con <em>Posizione</em> impostata a sinistra o a destra. O cambi il <em>Tipo</em> a "normale" o segui <a href="https://wpadvancedads.com/adsense-responsive-custom-sizes/?utm_source=advanced-ads&amp;utm_medium=link&amp;utm_campaign=adsense-custom-sizes-tutorial" target="_blank">questo tutorial</a> se vuoi che l'annuncio sia racchiuso nel testo.</li>
                        @endif
                    </ul>
                    <div id="advanced-ads-tinymce-wrapper" style="display: none;">
                        @include('partials.advanced-ads-tinymce')
                    </div>
                    <div id="advanced-ads-ad-parameters" class="advads-option-list">
                        <label for="advads-group-id" class="label">gruppo annunci</label>
                        <div>
                            <select name="advanced_ad[output][group_id]" id="advads-group-id">
                                @foreach ($ad_groups as $group_id => $group_label)
                                    <option value="{{ $group_id }}">{{ $group_label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <span class="label">dimensione</span>
                        <div id="advanced-ads-ad-parameters-size">
                            <label>larghezza<input type="number" value="{{ $ad_width ?? 0 }}" name="advanced_ad[width]">px</label>
                            <label>altezza<input type="number" value="{{ $ad_height ?? 0 }}" name="advanced_ad[height]">px</label>
                            <label><input type="checkbox" id="advads-wrapper-add-sizes" name="advanced_ad[output][add_wrapper_sizes]" value="true" @if($reserve_space) disabled @endif>prenota questo spazio</label>
                        </div>
                    </div>
                    <div id="advads-cache-busting-check-wrap">
            <span id="advads-cache-busting-error-result" class="advads-notice-inline advads-error" style="display:none;">
                Il codice di questo annuncio potrebbe non funzionare correttamente con il busting della cache attivato. <a href="https://wpadvancedads.com/manual/cache-busting/#advads-passive-compatibility-warning" target="_blank">Manuale</a>
            </span>
                        <input type="hidden" id="advads-cache-busting-possibility" name="advanced_ad[cache-busting][possible]" value="true">
                    </div>
                    <script>
                        jQuery( document ).ready(function() {
                            if ( typeof advads_cb_check_ad_markup !== 'undefined' ){
                                var ad_content = "";
                                advads_cb_check_ad_markup( ad_content );
                            }
                        });
                    </script>
                </div>
            </div>

        </div>
        <br class="clear">
    </div>
@endsection

