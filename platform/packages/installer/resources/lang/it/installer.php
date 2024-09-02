<?php

return [

    /**
     *
     * Traduzioni condivise.
     *
     */
    'title' => 'Installazione',
    'next' => 'Passo Successivo',
    'back' => 'Precedente',
    'finish' => 'Installa',
    'installation' => 'Installazione',
    'forms' => [
        'errorTitle' => 'Si sono verificati i seguenti errori:',
    ],

    /**
     *
     * Traduzioni della pagina iniziale.
     *
     */
    'welcome' => [
        'title' => 'Benvenuto',
        'message' => 'Prima di iniziare, abbiamo bisogno di alcune informazioni sul database. Dovrai conoscere i seguenti elementi prima di procedere.',
        'language' => 'Lingua',
        'next' => 'Andiamo',
    ],

    /**
     *
     * Traduzioni della pagina dei requisiti.
     *
     */
    'requirements' => [
        'title' => 'Requisiti del Server',
        'next' => 'Verifica Permessi',
    ],

    /**
     *
     * Traduzioni della pagina dei permessi.
     *
     */
    'permissions' => [
        'next' => 'Configura Ambiente',
    ],

    /**
     *
     * Traduzioni della pagina dell'ambiente.
     *
     */
    'environment' => [
        'wizard' => [
            'title' => 'Impostazioni dell\'Ambiente',
            'form' => [
                'name_required' => 'È richiesto un nome per l\'ambiente.',
                'app_name_label' => 'Titolo del sito',
                'app_name_placeholder' => 'Titolo del sito',
                'app_url_label' => 'URL',
                'app_url_placeholder' => 'URL',
                'db_connection_label' => 'Connessione al Database',
                'db_connection_label_mysql' => 'MySQL',
                'db_connection_label_sqlite' => 'SQLite',
                'db_connection_label_pgsql' => 'PostgreSQL',
                'db_host_label' => 'Host del Database',
                'db_host_placeholder' => 'Host del Database',
                'db_port_label' => 'Porta del Database',
                'db_port_placeholder' => 'Porta del Database',
                'db_name_label' => 'Nome del Database',
                'db_name_placeholder' => 'Nome del Database',
                'db_username_label' => 'Nome Utente del Database',
                'db_username_placeholder' => 'Nome Utente del Database',
                'db_password_label' => 'Password del Database',
                'db_password_placeholder' => 'Password del Database',
                'buttons' => [
                    'install' => 'Installa',
                ],
                'db_host_helper' => 'Se utilizzi Laravel Sail, basta cambiare DB_HOST in DB_HOST=mysql. Su alcuni hosting DB_HOST può essere localhost invece di 127.0.0.1',
                'db_connections' => [
                    'mysql' => 'MySQL',
                    'sqlite' => 'SQLite',
                    'pgsql' => 'PostgreSQL',
                ],
            ],
        ],
        'success' => 'Le impostazioni del tuo file .env sono state salvate correttamente.',
        'errors' => 'Impossibile salvare il file .env. Per favore, crealo manualmente.',
    ],

    'theme' => [
        'title' => 'Scegli un tema',
        'message' => 'Scegli un tema per personalizzare l\'aspetto del tuo sito web. Questa selezione importerà anche dati di esempio adattati al tema scelto.',
    ],

    /**
     * Pagina di creazione account.
     */
    'createAccount' => [
        'title' => 'Crea account',
        'form' => [
            'first_name' => 'Nome',
            'last_name' => 'Cognome',
            'username' => 'Nome utente',
            'email' => 'Email',
            'password' => 'Password',
            'password_confirmation' => 'Conferma password',
            'create' => 'Crea',
        ],
    ],

    /**
     * Pagina della licenza.
     */

    'license' => [
        'title' => 'Attiva Licenza',
        'skip' => 'Salta per ora',
    ],

    'install' => 'Installa',

    'final' => [
        'pageTitle' => 'Installazione Completata',
        'title' => 'Fatto',
        'message' => 'L\'applicazione è stata installata con successo.',
        'exit' => 'Vai al pannello di amministrazione',
    ],

    'install_success' => 'Installato con successo!',

    'install_step_title' => 'Installazione - Passo :step: :title',
];
