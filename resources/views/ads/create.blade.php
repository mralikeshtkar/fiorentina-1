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
        </div>
        <br class="clear">
    </div>
@endsection

