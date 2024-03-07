<?php

return [
    'labels' => [
        'name' => 'Bedrijfsnaam: *',
        'email' => 'E-mail: *',
        'address' => 'Adres:',
        'zip_code' => 'Postcode:',
        'place' => 'Plaats:',
        'phone_number' => 'Telefoon:',
        'created_at' => 'Aangemaakt op:'
    ],
    'messages' => [
        'not_allowed' => 'U bent niet bevoegd deze actie uit te voeren.'
    ],
    'index' => [
        'add_company' => '<i class="fas fa-plus mr-2"></i>Bedrijf',
    ],
    'create' => [
        'title' => 'Nieuw bedrijf',
        'submit_button' => 'Bedrijf toevoegen',
        'messages' => [
            'success' => 'Het bedrijf :Company is met succes aangemaakt.',
            'fail' => 'Er is iets fout gegaan bij het aanmaken van een bedrijf.',
        ]
    ],
    'edit' => [
        'title' => 'Bedrijf bekijken/bewerken',
        'title_with_name' => ':Company bewerken',
        'submit_button' => 'Bedrijf bewerken',
        'delete_button' => 'Bedrijf verwijderen'
    ],
    'update' => [
        'messages' => [
            'success' => 'Het bedrijf :Company is met succes bewerkt.',
            'fail' => 'Er is iets fout gegaan bij het bewerken van :Company',
        ]
    ],
    'delete' => [
        'messages' => [
            'success' => 'Bedrijf succesvol verwijderd.',
            'fail' => 'Er is iets fout gegaan bij het verwijderen van :Company'
        ]
    ]
];
