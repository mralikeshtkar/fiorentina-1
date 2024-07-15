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
                <div class="postbox-header"><h2 class="hndle ui-sortable-handle">Parametri annuncio</h2>
                    <div class="handle-actions hide-if-no-js"><button type="button" class="handle-order-higher" aria-disabled="false" aria-describedby="ad-parameters-box-handle-order-higher-description"><span class="screen-reader-text">Sposta in alto</span><span class="order-higher-indicator" aria-hidden="true"></span></button><span class="hidden" id="ad-parameters-box-handle-order-higher-description">Sposta in su il riquadro Parametri annuncio</span><button type="button" class="handle-order-lower" aria-disabled="false" aria-describedby="ad-parameters-box-handle-order-lower-description"><span class="screen-reader-text">Sposta in basso</span><span class="order-lower-indicator" aria-hidden="true"></span></button><span class="hidden" id="ad-parameters-box-handle-order-lower-description">Sposta in giù il riquadro Parametri annuncio</span><button type="button" class="handlediv" aria-expanded="true"><span class="screen-reader-text">Attiva/disattiva il pannello: Parametri annuncio</span><span class="toggle-indicator" aria-hidden="true"></span></button></div></div><div class="inside">
                    <ul id="ad-parameters-box-notices" class="advads-metabox-notices"><li class="advads-auto-ad-in-ad-content hidden advads-notice-inline advads-error">Il codice di verifica AdSense e gli Annunci automatici sono già attivati nelle <a href="https://www.laviola.it/wp-admin/admin.php?page=advanced-ads-settings#top#adsense">impostazioni AdSense</a>. Non è necessario aggiungere manualmente il codice qui, a meno che non lo si voglia includere solo in determinate pagine.</li><li class="advanced-ads-adsense-amp-warning advads-notice-inline advads-idea hidden">Questo tipo di annuncio non è supportato nelle pagine AMP</li><li class="advads-ad-notice-responsive-position advads-notice-inline advads-error hidden">Gli annunci AdSense adattabili non funzionano in modo affidabile con <em>Posizione</em>impostata a sinistra o a destra. O cambi il <em>Tipo</em> a "normale" o segui <a href="https://wpadvancedads.com/adsense-responsive-custom-sizes/?utm_source=advanced-ads&amp;utm_medium=link&amp;utm_campaign=adsense-custom-sizes-tutorial" target="_blank">questo tutorial</a> se vuoi che l'annuncio sia racchiuso nel testo.</li></ul><div id="advanced-ads-tinymce-wrapper" style="display: none;">
                        <div id="wp-advanced-ads-tinymce-wrap" class="wp-core-ui wp-editor-wrap html-active"><link rel="stylesheet" id="editor-buttons-css" href="https://www.laviola.it/wp-includes/css/editor.min.css?ver=73ed650c248429f6cc5cffb8250d5795" media="all">
                            <div id="wp-advanced-ads-tinymce-editor-tools" class="wp-editor-tools hide-if-no-js"><div id="wp-advanced-ads-tinymce-media-buttons" class="wp-media-buttons"><button type="button" id="insert-media-button" class="button insert-media add_media" data-editor="advanced-ads-tinymce"><span class="wp-media-buttons-icon"></span> Aggiungi media</button>				<button type="button" class="button foogallery-modal-trigger" title="Add Gallery From FooGallery" style="padding-left: .4em;" data-editor="advanced-ads-tinymce">
                                        <span class="wp-media-buttons-icon dashicons dashicons-format-gallery"></span> Add FooGallery				</button>
                                </div>
                                <div class="wp-editor-tabs"><button type="button" id="advanced-ads-tinymce-tmce" class="wp-switch-editor switch-tmce" data-wp-editor-id="advanced-ads-tinymce">Visuale</button>
                                    <button type="button" id="advanced-ads-tinymce-html" class="wp-switch-editor switch-html" data-wp-editor-id="advanced-ads-tinymce">Testo</button>
                                </div>
                            </div>
                            <div id="wp-advanced-ads-tinymce-editor-container" class="wp-editor-container"><div id="qt_advanced-ads-tinymce_toolbar" class="quicktags-toolbar hide-if-no-js"><input type="button" id="qt_advanced-ads-tinymce_strong" class="ed_button button button-small" aria-label="Grassetto" value="b"><input type="button" id="qt_advanced-ads-tinymce_em" class="ed_button button button-small" aria-label="Corsivo" value="i"><input type="button" id="qt_advanced-ads-tinymce_link" class="ed_button button button-small" aria-label="Inserisci link" value="link"><input type="button" id="qt_advanced-ads-tinymce_block" class="ed_button button button-small" aria-label="Citazione" value="b-quote"><input type="button" id="qt_advanced-ads-tinymce_del" class="ed_button button button-small" aria-label="Testo eliminato (barrato)" value="del"><input type="button" id="qt_advanced-ads-tinymce_ins" class="ed_button button button-small" aria-label="Testo inserito" value="ins"><input type="button" id="qt_advanced-ads-tinymce_img" class="ed_button button button-small" aria-label="Inserisci immagine" value="img"><input type="button" id="qt_advanced-ads-tinymce_ul" class="ed_button button button-small" aria-label="Elenco puntato" value="ul"><input type="button" id="qt_advanced-ads-tinymce_ol" class="ed_button button button-small" aria-label="Elenco numerato" value="ol"><input type="button" id="qt_advanced-ads-tinymce_li" class="ed_button button button-small" aria-label="Voce in elenco" value="li"><input type="button" id="qt_advanced-ads-tinymce_code" class="ed_button button button-small" aria-label="Codice" value="code"><input type="button" id="qt_advanced-ads-tinymce_more" class="ed_button button button-small" aria-label="Inserisci il tag Leggi tutto" value="more"><input type="button" id="qt_advanced-ads-tinymce_close" class="ed_button button button-small" title="Chiudi tutti i tag aperti" value="chiudi tag"></div><textarea class="wp-editor-area" style="height: 300px" autocomplete="off" cols="40" name="advanced-ads-tinymce" id="advanced-ads-tinymce"></textarea></div>
                            <div class="uploader-editor">
                                <div class="uploader-editor-content">
                                    <div class="uploader-editor-title">Trascina file per caricare</div>
                                </div>
                            </div></div>

                    </div>
                    <div id="advanced-ads-ad-parameters" class="advads-option-list"><label for="advads-group-id" class="label">gruppo annunci</label><div><select name="advanced_ad[output][group_id]" id="advads-group-id"><option value="514">230x90 centrale</option><option value="515">230x90 dx</option><option value="513">230x90 sx</option><option value="486">300x250 b1</option><option value="485">300x250 c1</option><option value="367">300x250 top</option><option value="364">468x60 top dx</option><option value="362">468x60 top sx</option><option value="366">728x90 b1</option><option value="365">728x90 c1</option><option value="483">728x90 c2</option><option value="512">728X90 testata</option><option value="8294">Gruppo popup desktop</option><option value="9098">Gruppo popup mobile</option><option value="18513">In Article Desktop 2024</option><option value="8365">Mobile dopo foto</option><option value="18512">Mobile home Top 24</option><option value="8507">Mobile posizione 1</option><option value="8508">Mobile posizione 2</option><option value="8364">Mobile posizione 3</option><option value="8503">Mobile posizione 4</option><option value="16686">Mobile posizione 5</option><option value="18587">rotation 100</option><option value="18586">Rotazione 728x200</option><option value="578">Skin</option><option value="2915">Skin_mobile</option></select></div><hr><span class="label">dimensione</span>
                        <div id="advanced-ads-ad-parameters-size">
                            <label>larghezza<input type="number" value="0" name="advanced_ad[width]">px</label>
                            <label>altezza<input type="number" value="0" name="advanced_ad[height]">px</label>
                            <label><input type="checkbox" id="advads-wrapper-add-sizes" name="advanced_ad[output][add_wrapper_sizes]" value="true" disabled="">prenota questo spazio</label>
                        </div>
                        <hr>
                    </div>
                    <div id="advads-cache-busting-check-wrap">
    <span id="advads-cache-busting-error-result" class="advads-notice-inline advads-error" style="display:none;">
        Il codice di questo annuncio potrebbe non funzionare correttamente con il busting della cache attivato. <a href="https://wpadvancedads.com/manual/cache-busting/#advads-passive-compatibility-warning" target="_blank">Manuale</a>    </span>
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
                    <div class="advads-option-list">
                        <span class="label">tracciamento</span>
                        <div>
                            <select name="advanced_ad[tracking][enabled]">
                                <option value="default" selected="selected">predefinito</option>
                                <option value="disabled">disabilitato</option>
                                <option value="enabled">abilitato</option>
                            </select>
                            <a href="https://wpadvancedads.com/manual/tracking-documentation/?utm_source=advanced-ads?utm_medium=link&amp;utm_campaign=ad-edit-tracking" class="advads-manual-link" target="_blank">
                                Manuale		</a>
                        </div>
                        <hr>
                        <label for="advads-url" class="label" style="display: none;">Target URL</label>
                        <div style="display: none;">

                            <input type="url" name="advanced_ad[url]" id="advads-url" class="advads-ad-url" style="width:60%;" value="" placeholder="https://www.example.com/">
                            <a href="https://wpadvancedads.com/manual/tracking-documentation/?utm_source=advanced-ads&amp;utm_medium=link&amp;utm_campaign=ad-edit-tracking-url#Click_tracking_and_link_cloaking" class="advads-manual-link" target="_blank">Manuale</a>
                            <p class="description">
                                Links your ad to the target URL. If the ad code contains an <code>&lt;a&gt;</code> tag with a link target, copy the URL into the Target URL field and add <code>"%link%"</code> to your ad code.		</p>
                            <p>
                                <label for="advads-cloaking">
                                    <input type="checkbox" name="advanced_ad[tracking][cloaking]" id="advads-cloaking">
                                    Maschera il tuo link. Il link verrà visualizzato come <code>https://www.laviola.it/linkout/539472</code>.			</label>
                            </p>
                        </div>
                        <hr style="display: none;">
                        <span class="label" style="display: none;">finestra di destinazione</span>
                        <div style="display: none;">
                            <label><input name="advanced_ad[tracking][target]" type="radio" value="default" checked="checked">predefinito		</label>
                            <label><input name="advanced_ad[tracking][target]" type="radio" value="same">stessa finestra		</label>
                            <label><input name="advanced_ad[tracking][target]" type="radio" value="new">nuova finestra		</label>
                            <span class="advads-help"><span class="advads-tooltip">Dove aprire il link (se presente).</span></span>
                        </div>
                        <hr style="display: none;">
                        <span class="label" style="display: none;">Aggiungi “nofollow”</span>
                        <div style="display: none;">
                            <label><input name="advanced_ad[tracking][nofollow]" type="radio" value="default" checked="checked">predefinito		</label>
                            <label><input name="advanced_ad[tracking][nofollow]" type="radio" value="1">si		</label>
                            <label><input name="advanced_ad[tracking][nofollow]" type="radio" value="0">no		</label>
                            <span class="advads-help">
			<span class="advads-tooltip">
				Aggiungi <code>rel="nofollow"</code> ai link di tracciamento.			</span>
		</span>
                        </div>
                        <hr style="display: none;">
                        <span class="label" style="display: none;">Aggiungi "sponsorizzato"</span>
                        <div style="display: none;">
                            <label>
                                <input name="advanced_ad[tracking][sponsored]" type="radio" value="default" checked="checked">
                                predefinito		</label>
                            <label>
                                <input name="advanced_ad[tracking][sponsored]" type="radio" value="1">
                                si		</label>
                            <label>
                                <input name="advanced_ad[tracking][sponsored]" type="radio" value="0">
                                no		</label>
                            <span class="advads-help">
			<span class="advads-tooltip">
				Aggiungi <code>rel="sponsored"</code> ai link di tracciamento.			</span>
		</span>
                        </div>
                        <hr style="display: none;">
                    </div>
                </div>
            </div>
        </div>
        <br class="clear">
    </div>
@endsection

