<?php

return [
    'adminEmail' => 'admin@example.com',
    'copyrightString' => 'Some Copyright 2015',
    'registerEnabled' => 1,
    'defaultUsers' => [
        [
            'username' => 'admin',
            'password' => 'admin',
            'email' => 'admin@admin.ru',
            'role' => 'admin'
        ],
        [
            'username' => 'user',
            'password' => 'user',
            'email' => 'user@user.ru',
            'role' => 'user'
        ]
    ],
    'postPerPage' => [
        'category' => 5,
        'index' => 5
    ]
];
