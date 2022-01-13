<?php

return [
    'labels' => [
        'support_power_is_chosen' => 'De keuze van deze hulpkracht staat vast:',
        'support_power_is_not_chosen' => 'Kies een hulpkracht van de onderstaande keuzes:',
        'created_at' => 'Aangemaakt op:',
        'client' => 'Client:',
        'file_status' => 'Rapport bestand status:'
    ],
    'index' => [
        'title' => 'Rapporten',
        'panel_title' => 'rapporten gevonden',
        'table_headers' => [
            'client' => 'Client',
            'first_core_power' => 'Kernkracht 1',
            'second_core_power' => 'Kernkracht 2',
            'first_support_power' => 'Hulpkracht 1',
            'second_support_power' => 'Hulpkracht 2',
            'actions' => 'Acties'
        ],
        'show_button' => 'Bekijken',
        'delete_button' => 'Verwijderen'
    ],
    'create' => [
        'title' => 'Hulpkrachten kiezen voor rapport',
        'submit_button' => 'Rapport maken',
        'please_make_a_choice' => 'Maak hier uw keuze',
        'messages' => [
            'fail' => 'Er is iets fout gegaan bij het aanmaken van een report.',
            'max_calculations' => 'U zit op het maximum aantal berekeningen, waardoor u niet in staat bent een nieuwe berekening te doen.',
            'unicorn' => 'De match van uw kernkrachten geeft de status "Unicorn". Dit betekent dat u uniek bent in uw kernkrachten. Hier kunnen wij helaas geen rapport voor maken.'
        ]
    ],
    'show' => [
        'title' => 'Rapport bekijken',
        'title_with_name' => ':Client\'s rapport bekijken',
        'client_button' => 'Client bekijken',
        'delete_button' => 'Rapport verwijderen',
        'make_file_button' => 'Rapport bestand aanmaken',
        'export_button' => 'Exporteer',
        'recreate_button' => 'Opnieuw aanmaken',
        'first_line' => 'Dit rapport is opgemaakt op <span class="font-weight-bold">:date</span>',
        'second_line' => 'In opdracht van <span class="font-weight-bold">:user</span>',
        'third_line' => 'Zijn twee kernkrachten zijn <span class="font-weight-bold">:first_core_power</span> en <span class="font-weight-bold">:second_core_power</span>',
        'fourth_line' => 'En zijn twee hulpkrachten zijn <span class="font-weight-bold">:first_support_power</span> en <span class="font-weight-bold">:second_support_power</span>',
    ],
    'delete' => [
        'messages' => [
            'fail' => 'Er is fiets gegaan bij het verwijderen van een rapport.',
            'success' => 'Je hebt succesvol een rapport verwijderd.'
        ]
    ],
    'mail' => [
        'sent' => [
            'success' => 'Mail succesvol verstuurd!',
            'failed' => 'Mail kon niet verstuurd worden!'
        ]
    ],
    'status' => [
        'not_found' => 'Niet gevonden',
        'in_the_make' => 'Op dit moment wordt het bestand gemaakt. Dit kan enkele minuten duren.',
        'available' => 'Gevonden',
    ],
];
