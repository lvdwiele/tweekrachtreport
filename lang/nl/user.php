<?php

return [
    'labels' => [
        'name' => 'Naam:',
        'email' => 'E-mail:',
        'phone_number' => 'Telefoon nummer:',
        'support_calculation' => 'Hulp berekening:',
        'role' => 'Rol:',
        'created_at' => 'Aangemaakt op: ',
        'password' => 'Wachtwoord:',
        'password_confirmation' => 'Wachtwoord bevestiging:'
    ],
    'messages' => [
        'not_allowed' => 'U bent niet bevoegd deze actie uit te voeren.'
    ],
    'index' => [
        'title' => 'Gebruikers',
        'panel_title' => 'gebruikers gevonden',
        'table_headers' => [
            'name' => 'Naam',
            'email' => 'E-mail',
            'role' => 'Rol',
            'rate' => 'Tarief',
            'reports_amount' => 'Totaal aantal rapporten',
            'reports_amount_this_month' => 'Rapporten deze maand',
            'reports_amount_previous_month' => 'Rapporten in ' . \Carbon\Carbon::now()->subMonths(1)->get('monthName'),
            'reports_amount_previous_previous_month' => 'Rapporten in ' . \Carbon\Carbon::now()->subMonths(2)->get('monthName'),
        ],
        'add_user' => '<i class="fas fa-plus mr-2"></i>Gebruiker'
    ],
    'show' => [
        'title' => 'Gebruiker bekijken',
        'title_with_name' => 'Gebruiker :User bekijken'
    ],
    'create' => [
        'title' => 'Gebruiker toevoegen',
        'panel_title' => 'Voeg een nieuwe gebruiker toe',
        'submit_button' => 'Gebruiker toevoegen',
        'messages' => [
            'success' => 'Gebruiker :User is met succes aangemaakt.'
        ],
        'message_after_creating' => 'Wanneer u op \'Gebruiker toevoegen\' drukt, wordt er een mail gestuurd naar het opgegeven e-mailadres.',
        'make_a_choice' => 'Selecteer hier een rol'
    ],
    'edit' => [
        'delete_button' => "Gebruiker verwijderen"
    ],
    'update' => [
        'messages' => [
            'success' => 'De gebruiker :User is met succes bewerkt.',
            'fail' => 'Er is iets fout gegaan bij het bewerken van :User',
        ]
    ],
    'request_messages' => [
        'name' => [
            'required' => 'Het naam veld is verplicht.'
        ],
        'email' => [
            'required' => 'Het email veld is verplicht.',
            'email' => 'Het ingevulde e-mailadres is niet geldig.'
        ],
        'password' => [
            'required' => 'Het wachtwoord veld is verplicht.',
            'confirm' => 'De opgegeven wachtwoorden komen niet overeen.'
        ],
        'role_id' => [
            'required' => 'Een rol selecteren is verplicht.'
        ]
    ],
    'verify' => [
        'greeting' => 'Hoi hoi!',
        'subject' => 'Account activeren',
        'action' => 'Account activeren',
        'lines' => [
            'one' => 'Klik op de knop hieronder om jouw account te activeren. Je wordt gevraagd een wachtwoord in te vullen, dit wordt uiteindelijk het wachtwoord die jou toegang geeft tot het Tweekracht platform.',
            'two' => 'Indien je geen account hoort te krijgen op het Tweekracht platform, geliefd deze mail te negeren/verwijderen.'
        ],
        'salutation' => 'Mieke en Ariën,'
    ]
];
