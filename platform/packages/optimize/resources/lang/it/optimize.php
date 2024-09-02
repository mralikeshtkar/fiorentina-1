<?php

return [
    'settings' => [
        'title' => 'Ottimizzazione',
        'description' => 'Minimizza l\'output HTML, inserisci CSS in linea, rimuovi commenti...',
        'enable' => 'Abilitare l\'ottimizzazione della velocità della pagina?',
    ],
    'collapse_white_space' => 'Comprimi spazi bianchi',
    'collapse_white_space_description' => 'Questo filtro riduce i byte trasmessi in un file HTML rimuovendo gli spazi bianchi non necessari.',
    'elide_attributes' => 'Elimina attributi',
    'elide_attributes_description' => 'Questo filtro riduce la dimensione dei file HTML rimuovendo gli attributi dai tag quando il valore specificato è uguale al valore predefinito per quell\'attributo. Questo può risparmiare un numero modesto di byte e rendere il documento più comprimibile canonizzando i tag interessati.',
    'inline_css' => 'CSS in linea',
    'inline_css_description' => 'Questo filtro trasforma l\'attributo "style" in linea dei tag in classi spostando il CSS nell\'header.',
    'insert_dns_prefetch' => 'Inserisci prefetch DNS',
    'insert_dns_prefetch_description' => 'Questo filtro inserisce tag nell\'HEAD per consentire al browser di eseguire il prefetch DNS.',
    'remove_comments' => 'Rimuovi commenti',
    'remove_comments_description' => 'Questo filtro elimina i commenti HTML, JS e CSS. Il filtro riduce la dimensione dei file HTML rimuovendo i commenti. A seconda del file HTML, questo filtro può ridurre significativamente il numero di byte trasmessi sulla rete.',
    'remove_quotes' => 'Rimuovi virgolette',
    'remove_quotes_description' => 'Questo filtro elimina le virgolette non necessarie dagli attributi HTML. Sebbene richieste dalle varie specifiche HTML, i browser ne consentono l\'omissione quando il valore di un attributo è composto da un certo sottoinsieme di caratteri (alfanumerici e alcuni caratteri di punteggiatura).',
    'defer_javascript' => 'Posticipa javascript',
    'defer_javascript_description' => 'Posticipa l\'esecuzione di javascript nell\'HTML. Se necessario, annulla il rinvio in alcuni script utilizzando data-pagespeed-no-defer come attributo dello script per annullare il rinvio.',
];
