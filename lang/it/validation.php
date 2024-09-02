<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Linee guida di validazione
    |--------------------------------------------------------------------------
    |
    | Le seguenti linee guida linguistiche contengono i messaggi di errore
    | predefiniti utilizzati dalla classe di validazione. Alcune di queste
    | regole hanno più versioni, come le regole sulle dimensioni. Sentiti
    | libero di modificare ciascuno di questi messaggi qui.
    |
    */

    'accepted' => 'Il campo :attribute deve essere accettato.',
    'accepted_if' => 'Il campo :attribute deve essere accettato quando :other è :value.',
    'active_url' => 'Il campo :attribute non è un URL valido.',
    'after' => 'Il campo :attribute deve essere una data successiva a :date.',
    'after_or_equal' => 'Il campo :attribute deve essere una data successiva o uguale a :date.',
    'alpha' => 'Il campo :attribute può contenere solo lettere.',
    'alpha_dash' => 'Il campo :attribute può contenere solo lettere, numeri, trattini e trattini bassi.',
    'alpha_num' => 'Il campo :attribute può contenere solo lettere e numeri.',
    'array' => 'Il campo :attribute deve essere un array.',
    'before' => 'Il campo :attribute deve essere una data precedente a :date.',
    'before_or_equal' => 'Il campo :attribute deve essere una data precedente o uguale a :date.',
    'between' => [
        'array' => 'Il campo :attribute deve contenere tra :min e :max elementi.',
        'file' => 'Il campo :attribute deve essere tra :min e :max kilobyte.',
        'numeric' => 'Il campo :attribute deve essere tra :min e :max.',
        'string' => 'Il campo :attribute deve essere tra :min e :max caratteri.',
    ],
    'boolean' => 'Il campo :attribute deve essere vero o falso.',
    'confirmed' => 'La conferma del campo :attribute non corrisponde.',
    'current_password' => 'La password è errata.',
    'date' => 'Il campo :attribute non è una data valida.',
    'date_equals' => 'Il campo :attribute deve essere una data uguale a :date.',
    'date_format' => 'Il campo :attribute non corrisponde al formato :format.',
    'declined' => 'Il campo :attribute deve essere rifiutato.',
    'declined_if' => 'Il campo :attribute deve essere rifiutato quando :other è :value.',
    'different' => 'I campi :attribute e :other devono essere diversi.',
    'digits' => 'Il campo :attribute deve essere di :digits cifre.',
    'digits_between' => 'Il campo :attribute deve essere tra :min e :max cifre.',
    'dimensions' => 'Il campo :attribute ha dimensioni dell\'immagine non valide.',
    'distinct' => 'Il campo :attribute ha un valore duplicato.',
    'doesnt_start_with' => 'Il campo :attribute non può iniziare con uno dei seguenti: :values.',
    'email' => 'Il campo :attribute deve essere un indirizzo email valido.',
    'ends_with' => 'Il campo :attribute deve terminare con uno dei seguenti: :values.',
    'enum' => 'Il :attribute selezionato non è valido.',
    'exists' => 'Il :attribute selezionato non è valido.',
    'file' => 'Il campo :attribute deve essere un file.',
    'filled' => 'Il campo :attribute deve avere un valore.',
    'gt' => [
        'array' => 'Il campo :attribute deve contenere più di :value elementi.',
        'file' => 'Il campo :attribute deve essere maggiore di :value kilobyte.',
        'numeric' => 'Il campo :attribute deve essere maggiore di :value.',
        'string' => 'Il campo :attribute deve essere maggiore di :value caratteri.',
    ],
    'gte' => [
        'array' => 'Il campo :attribute deve contenere :value elementi o più.',
        'file' => 'Il campo :attribute deve essere maggiore o uguale a :value kilobyte.',
        'numeric' => 'Il campo :attribute deve essere maggiore o uguale a :value.',
        'string' => 'Il campo :attribute deve essere maggiore o uguale a :value caratteri.',
    ],
    'image' => 'Il campo :attribute deve essere un\'immagine.',
    'in' => 'Il :attribute selezionato non è valido.',
    'in_array' => 'Il campo :attribute non esiste in :other.',
    'integer' => 'Il campo :attribute deve essere un numero intero.',
    'ip' => 'Il campo :attribute deve essere un indirizzo IP valido.',
    'ipv4' => 'Il campo :attribute deve essere un indirizzo IPv4 valido.',
    'ipv6' => 'Il campo :attribute deve essere un indirizzo IPv6 valido.',
    'json' => 'Il campo :attribute deve essere una stringa JSON valida.',
    'lt' => [
        'array' => 'Il campo :attribute deve contenere meno di :value elementi.',
        'file' => 'Il campo :attribute deve essere inferiore a :value kilobyte.',
        'numeric' => 'Il campo :attribute deve essere inferiore a :value.',
        'string' => 'Il campo :attribute deve essere inferiore a :value caratteri.',
    ],
    'lte' => [
        'array' => 'Il campo :attribute non deve contenere più di :value elementi.',
        'file' => 'Il campo :attribute deve essere inferiore o uguale a :value kilobyte.',
        'numeric' => 'Il campo :attribute deve essere inferiore o uguale a :value.',
        'string' => 'Il campo :attribute deve essere inferiore o uguale a :value caratteri.',
    ],
    'mac_address' => 'Il campo :attribute deve essere un indirizzo MAC valido.',
    'max' => [
        'array' => 'Il campo :attribute non deve contenere più di :max elementi.',
        'file' => 'Il campo :attribute non deve essere maggiore di :max kilobyte.',
        'numeric' => 'Il campo :attribute non deve essere maggiore di :max.',
        'string' => 'Il campo :attribute non deve essere maggiore di :max caratteri.',
    ],
    'mimes' => 'Il campo :attribute deve essere un file di tipo: :values.',
    'mimetypes' => 'Il campo :attribute deve essere un file di tipo: :values.',
    'min' => [
        'array' => 'Il campo :attribute deve contenere almeno :min elementi.',
        'file' => 'Il campo :attribute deve essere di almeno :min kilobyte.',
        'numeric' => 'Il campo :attribute deve essere almeno :min.',
        'string' => 'Il campo :attribute deve essere di almeno :min caratteri.',
    ],
    'multiple_of' => 'Il campo :attribute deve essere un multiplo di :value.',
    'not_in' => 'Il :attribute selezionato non è valido.',
    'not_regex' => 'Il formato del campo :attribute non è valido.',
    'numeric' => 'Il campo :attribute deve essere un numero.',
    'password' => [
        'letters' => 'Il campo :attribute deve contenere almeno una lettera.',
        'mixed' => 'Il campo :attribute deve contenere almeno una lettera maiuscola e una minuscola.',
        'numbers' => 'Il campo :attribute deve contenere almeno un numero.',
        'symbols' => 'Il campo :attribute deve contenere almeno un simbolo.',
        'uncompromised' => 'Il campo :attribute fornito è apparso in una violazione dei dati. Scegli un altro :attribute.',
    ],
    'present' => 'Il campo :attribute deve essere presente.',
    'prohibited' => 'Il campo :attribute è proibito.',
    'prohibited_if' => 'Il campo :attribute è proibito quando :other è :value.',
    'prohibited_unless' => 'Il campo :attribute è proibito a meno che :other sia in :values.',
    'prohibits' => 'Il campo :attribute vieta a :other di essere presente.',
    'regex' => 'Il formato del campo :attribute non è valido.',
    'required' => 'Il campo :attribute è obbligatorio.',
    'required_array_keys' => 'Il campo :attribute deve contenere voci per: :values.',
    'required_if' => 'Il campo :attribute è obbligatorio quando :other è :value.',
    'required_unless' => 'Il campo :attribute è obbligatorio a meno che :other sia in :values.',
    'required_with' => 'Il campo :attribute è obbligatorio quando :values è presente.',
    'required_with_all' => 'Il campo :attribute è obbligatorio quando sono presenti :values.',
    'required_without' => 'Il campo :attribute è obbligatorio quando :values non è presente.',
    'required_without_all' => 'Il campo :attribute è obbligatorio quando nessuno di :values è presente.',
    'same' => 'Il campo :attribute e :other devono corrispondere.',
    'size' => [
        'array' => 'Il campo :attribute deve contenere :size elementi.',
        'file' => 'Il campo :attribute deve essere di :size kilobyte.',
        'numeric' => 'Il campo :attribute deve essere :size.',
        'string' => 'Il campo :attribute deve essere di :size caratteri.',
    ],
    'starts_with' => 'Il campo :attribute deve iniziare con uno dei seguenti: :values.',
    'string' => 'Il campo :attribute deve essere una stringa.',
    'timezone' => 'Il campo :attribute deve essere un fuso orario valido.',
    'unique' => 'Il campo :attribute è già stato preso.',
    'uploaded' => 'Il campo :attribute non è riuscito a caricare.',
    'url' => 'Il campo :attribute deve essere un URL valido.',
    'uuid' => 'Il campo :attribute deve essere un UUID valido.',

    /*
    |--------------------------------------------------------------------------
    | Linee guida di validazione personalizzate
    |--------------------------------------------------------------------------
    |
    | Qui puoi specificare messaggi di validazione personalizzati per gli attributi
    | utilizzando la convenzione "attribute.rule" per denominare le righe. Questo
    | rende veloce specificare una particolare linea linguistica personalizzata
    | per una determinata regola dell'attributo.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'messaggio-personalizzato',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Attributi di validazione personalizzati
    |--------------------------------------------------------------------------
    |
    | Le seguenti linee guida linguistiche vengono utilizzate per sostituire il
    | nostro segnaposto dell'attributo con qualcosa di più leggibile, come
    | "Indirizzo e-mail" al posto di "email". Questo ci aiuta a rendere
    | i nostri messaggi più espressivi.
    |
    */

    'attributes' => [],

];


