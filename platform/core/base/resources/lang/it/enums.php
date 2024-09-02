<?php

return [
    'statuses' => [
        'draft' => 'Bozza',
        'pending' => 'In attesa',
        'published' => 'Pubblicato',
    ],
    'system_updater_steps' => [
        'download' => 'Scarica i file di aggiornamento',
        'update_files' => 'Aggiorna i file di sistema',
        'update_database' => 'Aggiorna i database',
        'publish_core_assets' => 'Pubblica le risorse principali',
        'publish_packages_assets' => 'Pubblica le risorse dei pacchetti',
        'clean_up' => 'Pulisci i file di aggiornamento del sistema',
        'done' => 'Sistema aggiornato con successo',

        'messages' => [
            'download' => 'Scaricamento dei file di aggiornamento in corso...',
            'update_files' => 'Aggiornamento dei file di sistema in corso...',
            'update_database' => 'Aggiornamento dei database in corso...',
            'publish_core_assets' => 'Pubblicazione delle risorse principali in corso...',
            'publish_packages_assets' => 'Pubblicazione delle risorse dei pacchetti in corso...',
            'clean_up' => 'Pulizia dei file di aggiornamento del sistema in corso...',
            'done' => 'Fatto! Il browser verrà aggiornato tra 30 secondi.',
        ],

        'failed_messages' => [
            'download' => 'Impossibile scaricare i file di aggiornamento',
            'update_files' => 'Impossibile aggiornare i file di sistema',
            'update_database' => 'Impossibile aggiornare i database',
            'publish_core_assets' => 'Impossibile pubblicare le risorse principali',
            'publish_packages_assets' => 'Impossibile pubblicare le risorse dei pacchetti',
            'clean_up' => 'Impossibile pulire i file di aggiornamento del sistema',
        ],

        'success_messages' => [
            'download' => 'File di aggiornamento scaricati con successo.',
            'update_files' => 'File di sistema aggiornati con successo.',
            'update_database' => 'Database aggiornati con successo.',
            'publish_core_assets' => 'Risorse principali pubblicate con successo.',
            'publish_packages_assets' => 'Risorse dei pacchetti pubblicate con successo.',
            'clean_up' => 'File di aggiornamento del sistema puliti con successo.',
        ],
    ],
];
