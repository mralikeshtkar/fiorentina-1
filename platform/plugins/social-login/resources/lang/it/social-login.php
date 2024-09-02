<?php

return [
    'settings' => [
        'title' => 'Impostazioni di accesso sociale',
        'description' => 'Configura le opzioni di accesso sociale',
        'facebook' => [
            'enable' => 'Abilita accesso con Facebook',
            'app_id' => 'ID App',
            'app_secret' => 'Segreto App',
            'helper' => 'Vai su https://developers.facebook.com per creare una nuova app e aggiornare ID App, Segreto App. L\'URL di callback è :callback',
            'data_deletion_request_callback_url' => 'Imposta questo URL :url come URL di richiesta di eliminazione dei dati nelle impostazioni della tua app Facebook per consentire agli utenti di richiedere l\'eliminazione dei loro dati.',
        ],
        'google' => [
            'enable' => 'Abilita accesso con Google',
            'app_id' => 'ID App',
            'app_secret' => 'Segreto App',
            'helper' => 'Vai su https://console.developers.google.com/apis/dashboard per creare una nuova app e aggiornare ID App, Segreto App. L\'URL di callback è :callback',
        ],
        'github' => [
            'enable' => 'Abilita accesso con GitHub',
            'app_id' => 'ID App',
            'app_secret' => 'Segreto App',
            'helper' => 'Vai su https://github.com/settings/developers per creare una nuova app e aggiornare ID App, Segreto App. L\'URL di callback è :callback',
        ],
        'linkedin' => [
            'enable' => 'Abilita accesso con LinkedIn',
            'app_id' => 'ID App',
            'app_secret' => 'Segreto App',
            'helper' => 'Vai su https://www.linkedin.com/developers/apps/new per creare una nuova app e aggiornare ID App, Segreto App. L\'URL di callback è :callback',
        ],
        'linkedin-openid' => [
            'enable' => 'Abilita accesso con LinkedIn usando OpenID Connect',
            'app_id' => 'ID App',
            'app_secret' => 'Segreto App',
            'helper' => 'Vai su https://www.linkedin.com/developers/apps/new per creare una nuova app e aggiornare ID App, Segreto App. L\'URL di callback è :callback',
        ],
        'enable' => 'Abilitare l\'accesso sociale?',
    ],
    'menu' => 'Accesso Sociale',
    'description' => 'Visualizza e aggiorna le impostazioni di accesso sociale',
];
