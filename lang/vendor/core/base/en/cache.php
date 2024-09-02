<?php

return [
    'cache_management' => 'Gestione Cache',
    'cache_management_description' => 'Cancella la cache per aggiornare il tuo sito.',
    'cache_commands' => 'Comandi per cancellare la cache',
    'commands' => [
        'clear_cms_cache' => [
            'title' => 'Cancella tutta la cache del CMS',
            'description' => 'Cancella la cache del CMS: cache del database, blocchi statici... Esegui questo comando quando non vedi le modifiche dopo aver aggiornato i dati.',
            'success_msg' => 'Cache pulita',
        ],
        'refresh_compiled_views' => [
            'title' => 'Aggiorna viste compilate',
            'description' => 'Cancella le viste compilate per aggiornare le visualizzazioni.',
            'success_msg' => 'Cache delle viste aggiornata',
        ],
        'clear_config_cache' => [
            'title' => 'Cancella cache della configurazione',
            'description' => 'Potrebbe essere necessario aggiornare la cache della configurazione quando modifichi qualcosa nell\'ambiente di produzione.',
            'success_msg' => 'Cache della configurazione pulita',
        ],
        'clear_route_cache' => [
            'title' => 'Cancella cache delle rotte',
            'description' => 'Cancella la cache delle rotte.',
            'success_msg' => 'La cache delle rotte è stata pulita',
        ],
        'clear_log' => [
            'title' => 'Cancella log',
            'description' => 'Cancella i file di log di sistema',
            'success_msg' => 'Il log di sistema è stato pulito',
        ],
    ],
];
