<?php

return [
    'admin_menu' => [
        'title' => 'Campi Personalizzati',
        'description' => 'Visualizza e gestisci i Campi Personalizzati',
    ],

    'page_title' => 'Campi Personalizzati',

    'all_field_groups' => 'Tutti i gruppi di campi',

    'form' => [
        'create_field_group' => 'Crea gruppo di campi',
        'edit_field_group' => 'Modifica gruppo di campi',
        'field_items_information' => 'Informazioni sugli elementi del campo',

        'repeater_fields' => 'Ripetitore',
        'add_field' => 'Aggiungi campo',
        'remove_field' => 'Rimuovi campo',
        'close_field' => 'Chiudi campo',
        'new_field' => 'Nuovo campo',

        'field_label' => 'Etichetta',
        'field_label_helper' => 'Questo è il titolo dell\'elemento del campo. Verrà mostrato nelle pagine di modifica.',
        'field_name' => 'Nome del campo',
        'field_name_helper' => 'L\'alias dell\'elemento del campo. Sono accettati numeri, caratteri e underscore.',
        'field_type' => 'Tipo di campo',
        'field_type_helper' => 'Seleziona il tipo di questo campo.',
        'field_instructions' => 'Istruzioni per il campo',
        'field_instructions_helper' => 'Le istruzioni guidano l\'utente a sapere cosa deve inserire.',

        'default_value' => 'Valore predefinito',
        'default_value_helper' => 'Il valore predefinito del campo quando lasciato vuoto',
        'placeholder' => 'Segnaposto',
        'placeholder_helper' => 'Testo segnaposto',
        'rows' => 'Righe',
        'rows_helper' => 'Righe di questa textarea',
        'choices' => 'Scelte',
        'choices_helper' => 'Inserisci ogni scelta su una nuova riga.<br>Per un maggiore controllo, puoi specificare sia un valore che un\'etichetta in questo modo:<br>rosso: Rosso<br>blu: Blu',
        'button_label' => 'Pulsante per ripetitore',

        'groups' => [
            'basic' => 'Base',
            'content' => 'Contenuto',
            'choice' => 'Scelte',
            'other' => 'Altro',
        ],

        'types' => [
            'text' => 'Campo di testo',
            'textarea' => 'Area di testo',
            'number' => 'Numero',
            'email' => 'Email',
            'password' => 'Password',
            'wysiwyg' => 'Editor WYSIWYG',
            'image' => 'Immagine',
            'file' => 'File',
            'select' => 'Seleziona',
            'checkbox' => 'Checkbox',
            'radio' => 'Radio',
            'repeater' => 'Ripetitore',
        ],

        'rules' => [
            'rules' => 'Regole di visualizzazione',
            'rules_helper' => 'Mostra questo gruppo di campi se',
            'add_rule_group' => 'Aggiungi gruppo di regole',
            'is_equal_to' => 'Uguale a',
            'is_not_equal_to' => 'Non uguale a',
            'and' => 'E',
            'or' => 'O',
        ],
    ],

    'import' => 'Importa',
    'export' => 'Esporta',
    'publish' => 'Pubblica',
    'remove_this_line' => 'Rimuovi questa riga',
    'collapse_this_line' => 'Comprimi questa riga',
    'error_occurred' => 'Si è verificato un errore',
    'request_completed' => 'Richiesta completata',
    'item_not_existed' => 'L\'elemento non esiste',
];
