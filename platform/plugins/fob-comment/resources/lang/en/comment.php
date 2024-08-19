<?php
//
//return [
//    'common' => [
//        'name' => 'Name',
//        'email' => 'Email',
//        'website' => 'Website',
//        'comment' => 'Comment',
//    ],
//
//    'title' => 'Comments',
//    'author' => 'Author',
//    'responsed_to' => 'Response to',
//    'permalink' => 'Permalink',
//    'url' => 'URL',
//    'submitted_on' => 'Submitted on',
//    'edit_comment' => 'Edit Comment',
//    'reply' => 'Reply',
//    'in_reply_to' => 'In reply to :name',
//
//    'reply_modal' => [
//        'title' => 'Reply to :comment',
//        'cancel' => 'Cancel',
//    ],
//
//    'allow_comments' => 'Allow comments',
//
//    'front' => [
//        'admin_badge' => 'Admin',
//
//        'list' => [
//            'title' => ':count comment|:count comments',
//            'reply' => 'Reply',
//            'reply_to' => 'Reply to :name',
//            'cancel_reply' => 'Cancel reply',
//            'waiting_for_approval_message' => 'Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.',
//        ],
//
//        'form' => [
//            'title' => 'Leave a comment',
//            'description' => 'Your email address will not be published. Required fields are marked *',
//            'cookie_consent' => 'Save my name, email, and website in this browser for the next time I comment.',
//            'submit' => 'Post Comment',
//        ],
//
//        'comment_success_message' => 'Your comment has been sent successfully.',
//    ],
//
//    'enums' => [
//        'statuses' => [
//            'pending' => 'Pending',
//            'approved' => 'Approved',
//            'spam' => 'Spam',
//            'trash' => 'Trash',
//        ],
//    ],
//
//    'settings' => [
//        'title' => 'FOB Comment',
//        'description' => 'Configure settings for FOB Comment',
//
//        'form' => [
//            'enable_recaptcha' => 'Enable reCAPTCHA',
//            'enable_recaptcha_help' => 'You need to enable reCAPTCHA in :url to use this feature.',
//            'captcha_setting_label' => 'Captcha Settings',
//            'comment_moderation' => 'Comments must be manually approved',
//            'comment_moderation_help' => 'All comments must be manually approved by an admin before displaying on the frontend.',
//            'show_comment_cookie_consent' => 'Show comments cookies checkbox, allowing visitors to save their information in the browser',
//            'auto_fill_comment_form' => 'Auto-fill comment data for logged-in users',
//            'auto_fill_comment_form_help' => 'The comment form will be automatically filled with user data such as full name, email, etc., if they are logged in.',
//            'comment_order' => 'Sort comments by',
//            'comment_order_help' => 'Choose the preferred order for displaying comments in the list.',
//            'comment_order_choices' => [
//                'asc' => 'Oldest',
//                'desc' => 'Newest',
//            ],
//            'display_admin_badge' => 'Display admin badge for admin comments',
//        ],
//    ],
//];


return [
    'common' => [
        'name' => 'Nome',
        'email' => 'Email',
        'website' => 'Sito web',
        'comment' => 'Commento',
    ],

    'title' => 'Commenti',
    'author' => 'Autore',
    'responsed_to' => 'Risposta a',
    'permalink' => 'Permalink',
    'url' => 'URL',
    'submitted_on' => 'Inviato il',
    'edit_comment' => 'Modifica Commento',
    'reply' => 'Rispondi',
    'in_reply_to' => 'In risposta a :name',

    'reply_modal' => [
        'title' => 'Rispondi a :comment',
        'cancel' => 'Annulla',
    ],

    'allow_comments' => 'Permetti i commenti',

    'front' => [
        'admin_badge' => 'Admin',

        'list' => [
            'title' => ':count commento|:count commenti',
            'reply' => 'Rispondi',
            'reply_to' => 'Rispondi a :name',
            'cancel_reply' => 'Annulla risposta',
            'waiting_for_approval_message' => 'Il tuo commento è in attesa di moderazione. Questo è un anteprima, il tuo commento sarà visibile dopo l’approvazione.',
        ],

        'form' => [
            'title' => 'Lascia un commento',
            'description' => 'Il tuo indirizzo email non sarà pubblicato. I campi obbligatori sono contrassegnati *',
            'cookie_consent' => 'Salva il mio nome, email e sito web in questo browser per la prossima volta che commenterò.',
            'submit' => 'Pubblica Commento',
        ],

        'comment_success_message' => 'Il tuo commento è stato inviato con successo.',
    ],

    'enums' => [
        'statuses' => [
            'pending' => 'In attesa',
            'approved' => 'Approvato',
            'spam' => 'Spam',
            'trash' => 'Cestino',
        ],
    ],

    'settings' => [
        'title' => 'FOB Comment',
        'description' => 'Configura le impostazioni per FOB Comment',

        'form' => [
            'enable_recaptcha' => 'Abilita reCAPTCHA',
            'enable_recaptcha_help' => 'Devi abilitare reCAPTCHA in :url per usare questa funzione.',
            'captcha_setting_label' => 'Impostazioni Captcha',
            'comment_moderation' => 'I commenti devono essere approvati manualmente',
            'comment_moderation_help' => 'Tutti i commenti devono essere approvati manualmente da un admin prima di essere visualizzati sul frontend.',
            'show_comment_cookie_consent' => 'Mostra la casella di consenso dei cookie per i commenti, permettendo ai visitatori di salvare le loro informazioni nel browser',
            'auto_fill_comment_form' => 'Riempi automaticamente il modulo dei commenti per gli utenti registrati',
            'auto_fill_comment_form_help' => 'Il modulo dei commenti sarà riempito automaticamente con i dati dell’utente, come nome completo, email, ecc., se è loggato.',
            'comment_order' => 'Ordina i commenti per',
            'comment_order_help' => 'Scegli l’ordine preferito per visualizzare i commenti nella lista.',
            'comment_order_choices' => [
                'asc' => 'Più vecchi',
                'desc' => 'Più recenti',
            ],
            'display_admin_badge' => 'Mostra il badge admin per i commenti dell’admin',
        ],
    ],
];
