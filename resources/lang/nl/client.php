<?php

return [
    'labels' => [
        'created_at' => 'Aangemaakt op: '
    ],
    'messages' => [
        'not_allowed' => 'U bent niet bevoegd deze actie uit te voeren.'
    ],
    'index' => [
        'add_client' => '<i class="fas fa-plus mr-2"></i>Client',
        'table_headers' => [
            'name' => 'Naam',
            'first_core_power' => 'Kernkracht 1',
            'second_core_power' => 'Kernkracht 2',
            'actions' => 'Acties'
        ],
        'delete_button' => 'Verwijderen',
        'report_button' => [
            'report' => 'Rapport',
            'make_report' => 'Nieuw rapport aanmaken'
        ],
        'edit_button' => 'Bewerken',
    ],
    'create' => [
        'title' => 'Nieuwe client',
        'submit_button' => 'Client toevoegen',
        'messages' => [
            'success' => 'Client :Client is met succes aangemaakt.',
            'fail' => 'Er is iets fout gegaan bij het aanmaken van een client.',
        ]
    ],
    'edit' => [
        'title' => 'Client bekijken/bewerken',
        'title_with_name' => ':Client bewerken',
        'submit_button' => 'Client bewerken',
        'delete_button' => 'Client verwijderen',
        'create_report_button' => 'Rapport maken',
        'show_report_button' => 'Rapport bekijken',
    ],
    'update' => [
        'messages' => [
            'success' => 'De client :Client is met succes bewerkt.',
            'fail' => 'Er is iets fout gegaan bij het bewerken van :Client',
        ]
    ],
    'delete' => [
        'messages' => [
            'success' => 'Client succesvol verwijderd.',
            'fail' => 'Er is iets fout gegaan bij het bewerken van :Client'
        ]
    ]
];
